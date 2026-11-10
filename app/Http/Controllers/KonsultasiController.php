<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\ProgramStudi;
use App\Models\RiwayatKonsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    /**
     * Menampilkan halaman konsultasi.
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::where('aktif', true)
            ->orderBy('urutan')
            ->get();

        return view('konsultasi.index', compact('pertanyaan'));
    }

    /**
     * Memproses jawaban menggunakan Forward Chaining.
     * Jika tidak ada aturan yang cocok, sistem menghitung
     * rekomendasi alternatif berdasarkan kecocokan aturan.
     */
    public function proses(Request $request)
    {
        $pertanyaan = Pertanyaan::where('aktif', true)
            ->orderBy('urutan')
            ->get();

        if ($pertanyaan->isEmpty()) {
            return back()->with(
                'error',
                'Pertanyaan belum tersedia. Silakan isi data pertanyaan terlebih dahulu.'
            );
        }

        $request->validate([
            'nama_pengguna' => 'nullable|string|max:255',
            'jawaban' => 'required|array',
        ]);

        $jawabanInput = $request->input('jawaban', []);
        $fakta = [];

        // Pastikan seluruh pertanyaan sudah dijawab.
        foreach ($pertanyaan as $item) {
            if (
                !array_key_exists($item->kode, $jawabanInput) ||
                !in_array(
                    (string) $jawabanInput[$item->kode],
                    ['0', '1'],
                    true
                )
            ) {
                return back()
                    ->withErrors([
                        'jawaban' => 'Jawab semua pertanyaan terlebih dahulu.'
                    ])
                    ->withInput();
            }

            $fakta[$item->kode] =
                ((string) $jawabanInput[$item->kode] === '1');
        }

        // Ambil program studi aktif sebagai kandidat rekomendasi.
        $semuaProdi = ProgramStudi::where('aktif', true)->get();

        if ($semuaProdi->isEmpty()) {
            return back()->with(
                'error',
                'Belum ada program studi aktif di dalam database.'
            );
        }

        // Ambil aturan aktif.
        $aturanAktif = Aturan::where('aktif', true)->get();

        $aturanValid = collect();
        $skorProdi = [];

        foreach ($aturanAktif as $aturan) {
            $kondisi = $aturan->kondisi;

            // Mendukung kondisi berbentuk array atau JSON.
            if (is_string($kondisi)) {
                $kondisi = json_decode($kondisi, true);
            }

            if (!is_array($kondisi) || empty($kondisi)) {
                continue;
            }

            // Abaikan aturan yang kesimpulannya tidak memiliki
            // program studi aktif.
            $prodiAda = $semuaProdi->firstWhere(
                'kode',
                $aturan->kesimpulan
            );

            if (!$prodiAda) {
                continue;
            }

            $jumlahKondisi = count($kondisi);
            $jumlahCocok = 0;
            $seluruhCocok = true;

            foreach ($kondisi as $kode => $nilai) {
                // Jika aturan menggunakan kode pertanyaan yang
                // tidak ditemukan, kondisi tersebut tidak cocok.
                if (!array_key_exists($kode, $fakta)) {
                    $seluruhCocok = false;
                    continue;
                }

                // Mendukung nilai boolean, 0/1, dan "0"/"1".
                $nilaiAturan = filter_var(
                    $nilai,
                    FILTER_VALIDATE_BOOLEAN,
                    FILTER_NULL_ON_FAILURE
                );

                if ($nilaiAturan === null) {
                    if (in_array($nilai, [0, '0'], true)) {
                        $nilaiAturan = false;
                    } elseif (in_array($nilai, [1, '1'], true)) {
                        $nilaiAturan = true;
                    } else {
                        $seluruhCocok = false;
                        continue;
                    }
                }

                if ($fakta[$kode] === $nilaiAturan) {
                    $jumlahCocok++;
                } else {
                    $seluruhCocok = false;
                }
            }

            $aturanValid->push([
                'aturan' => $aturan,
                'kondisi' => $kondisi,
                'jumlah_kondisi' => $jumlahKondisi,
                'jumlah_cocok' => $jumlahCocok,
                'seluruh_cocok' => $seluruhCocok,
            ]);

            // Skor alternatif: persentase kondisi aturan yang cocok.
            $skor = $jumlahKondisi > 0
                ? $jumlahCocok / $jumlahKondisi
                : 0;

            $kodeProdi = $aturan->kesimpulan;

            if (
                !isset($skorProdi[$kodeProdi]) ||
                $skor > $skorProdi[$kodeProdi]
            ) {
                $skorProdi[$kodeProdi] = $skor;
            }
        }

        // Tahap 1: Forward Chaining.
        // Semua kondisi pada aturan harus terpenuhi.
        $kodeCocok = $aturanValid
            ->filter(fn ($item) => $item['seluruh_cocok'])
            ->pluck('aturan.kesimpulan')
            ->unique()
            ->values()
            ->all();

        $modeHasil = 'forward_chaining';

        if (!empty($kodeCocok)) {
            $rekomendasi = $semuaProdi
                ->whereIn('kode', $kodeCocok)
                ->values();
        } else {
            // Tahap 2: rekomendasi alternatif berdasarkan
            // persentase kecocokan kondisi aturan.
            $modeHasil = 'alternatif';

            arsort($skorProdi);

            $kodeAlternatif = array_slice(
                array_keys($skorProdi),
                0,
                3
            );

            $rekomendasi = $semuaProdi
                ->filter(function ($prodi) use ($kodeAlternatif) {
                    return in_array(
                        $prodi->kode,
                        $kodeAlternatif,
                        true
                    );
                })
                ->sortBy(function ($prodi) use ($skorProdi) {
                    return -($skorProdi[$prodi->kode] ?? 0);
                })
                ->values();

            // Jika tidak ada aturan valid yang bisa dinilai,
            // tetap tampilkan program studi aktif sebagai pilihan.
            if ($rekomendasi->isEmpty()) {
                $rekomendasi = $semuaProdi->take(3)->values();
                $modeHasil = 'alternatif_umum';
            }
        }

        // Simpan riwayat dan jawaban dalam satu transaksi.
        $riwayat = DB::transaction(function () use (
            $request,
            $rekomendasi,
            $pertanyaan,
            $fakta
        ) {
            $riwayat = RiwayatKonsultasi::create([
                'kode_sesi' => (string) Str::uuid(),
                'nama_pengguna' => $request->nama_pengguna,
                'hasil_rekomendasi' => $rekomendasi->map(
                    fn ($prodi) => [
                        'kode' => $prodi->kode,
                        'nama' => $prodi->nama,
                        'deskripsi' => $prodi->deskripsi,
                    ]
                )->values()->all(),
                'status' => 'selesai',
            ]);

            foreach ($pertanyaan as $item) {
                Jawaban::create([
                    'riwayat_konsultasi_id' => $riwayat->id,
                    'pertanyaan_id' => $item->id,
                    'jawaban' => $fakta[$item->kode],
                ]);
            }

            return $riwayat;
        });

        return view(
            'konsultasi.hasil',
            compact('riwayat', 'rekomendasi', 'modeHasil')
        );
    }
}
