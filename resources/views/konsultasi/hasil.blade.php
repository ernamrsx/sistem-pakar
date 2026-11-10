<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi — StudiMatch</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple: #7054df;
            --purple-dark: #5037b7;
            --purple-light: #f0edff;
            --ink: #211d35;
            --muted: #77748b;
            --line: #eae8f2;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
            background: #faf9ff;
        }

        .navbar {
            min-height: 76px;
            padding: 15px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            background: white;
            border-bottom: 1px solid var(--line);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font: 800 21px 'Plus Jakarta Sans', sans-serif;
            letter-spacing: -1px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            color: white;
            background: var(--purple);
            border-radius: 12px;
        }

        .logo span { color: var(--purple); }

        .nav-tag {
            padding: 9px 13px;
            border-radius: 30px;
            color: var(--purple-dark);
            background: var(--purple-light);
            font-size: 12px;
            font-weight: 700;
        }

        main {
            width: min(760px, 100%);
            margin: auto;
            padding: 55px 20px 75px;
        }

        .card {
            padding: 35px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 25px;
            box-shadow: 0 15px 45px #392a7010;
        }

        .result-head {
            text-align: center;
            margin-bottom: 28px;
        }

        .result-symbol {
            width: 70px;
            height: 70px;
            display: grid;
            place-items: center;
            margin: 0 auto 18px;
            border-radius: 22px;
            background: var(--purple-light);
            font-size: 32px;
        }

        .eyebrow {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 30px;
            color: var(--purple-dark);
            background: var(--purple-light);
            font-size: 12px;
            font-weight: 700;
        }

        h1, h2, h3, p { margin-top: 0; }

        h1 {
            margin: 18px 0 12px;
            font: 800 clamp(25px, 5vw, 32px)/1.3 'Plus Jakarta Sans', sans-serif;
            letter-spacing: -1px;
        }

        .muted {
            color: var(--muted);
            line-height: 1.8;
            font-size: 14px;
        }

        .result-item {
            padding: 22px;
            margin-top: 14px;
            border: 1px solid var(--line);
            border-radius: 17px;
        }

        .result-label {
            display: inline-block;
            margin-bottom: 12px;
            padding: 6px 10px;
            border-radius: 8px;
            color: var(--purple-dark);
            background: var(--purple-light);
            font-size: 11px;
            font-weight: 700;
        }

        .result-item h2 {
            margin-bottom: 9px;
            font: 700 19px 'Plus Jakarta Sans', sans-serif;
        }

        .code {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 10px;
        }

        .description {
            margin-bottom: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .empty {
            padding: 22px;
            border-radius: 15px;
            background: #fff8e8;
            color: #785d23;
            line-height: 1.8;
            font-size: 14px;
        }

        .disclaimer {
            margin-top: 22px;
            padding: 15px;
            background: #f7f5ff;
            color: #55477e;
            border-radius: 12px;
            font-size: 12px;
            line-height: 1.8;
        }

        .button {
            display: block;
            width: 100%;
            margin-top: 13px;
            padding: 15px 18px;
            border: 0;
            border-radius: 13px;
            background: var(--purple);
            color: white;
            text-align: center;
            text-decoration: none;
            font: 700 14px 'DM Sans', sans-serif;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .button:hover { background: var(--purple-dark); }

        .button.secondary {
            border: 1px solid var(--line);
            background: white;
            color: var(--ink);
        }

        .button.secondary:hover {
            background: var(--purple-light);
        }

        footer {
            padding: 27px 20px;
            border-top: 1px solid var(--line);
            text-align: center;
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .navbar { padding: 15px 5%; }
            .nav-tag { font-size: 10px; }
            .card { padding: 23px; }
        }
    </style>
</head>

<body>

<header class="navbar">
    <div class="logo">
        <div class="logo-icon">S</div>
        Studi<span>Match</span>
    </div>

    <div class="nav-tag">
        Sistem Pakar · Forward Chaining
    </div>
</header>

<main>
    <section class="card">

        <div class="result-head">
            <div class="result-symbol">✨</div>
            <div class="eyebrow">✦ HASIL KONSULTASI</div>

            <h1>Rekomendasi Program Studimu</h1>

            @if ($riwayat->nama_pengguna)
                <p class="muted">
                    Hai, {{ $riwayat->nama_pengguna }}!
                    Terima kasih sudah menyelesaikan konsultasi.
                </p>
            @else
                <p class="muted">
                    Hai! Terima kasih sudah menyelesaikan konsultasi.
                </p>
            @endif

            {{-- Keterangan berdasarkan metode yang menghasilkan rekomendasi --}}
            @if (($modeHasil ?? 'forward_chaining') === 'alternatif')
                <p class="muted">
                    Tidak ada aturan yang cocok sepenuhnya dengan seluruh
                    jawabanmu. Berikut alternatif program studi berdasarkan
                    kecocokan sebagian kondisi aturan yang tersedia.
                </p>

            @elseif (($modeHasil ?? 'forward_chaining') === 'alternatif_umum')
                <p class="muted">
                    Aturan yang tersedia belum cukup untuk menghitung
                    kecocokan. Berikut beberapa program studi aktif
                    sebagai pilihan awal.
                </p>

            @else
                <p class="muted">
                    Rekomendasi berikut diperoleh dari aturan
                    Forward Chaining yang seluruh kondisinya terpenuhi.
                </p>
            @endif
        </div>

        {{-- Daftar rekomendasi --}}
        @if ($rekomendasi->isEmpty())
            <div class="empty">
                <strong>Program studi belum dapat ditampilkan.</strong>

                <p style="margin:8px 0 0">
                    Belum ada program studi aktif yang tersedia.
                    Silakan periksa data program studi di database.
                </p>
            </div>
        @else
            @foreach ($rekomendasi as $index => $prodi)
                <article class="result-item">

                    <span class="result-label">
                        @if ($index === 0)
                            Rekomendasi Utama
                        @else
                            Alternatif {{ $index + 1 }}
                        @endif
                    </span>

                    <h2>{{ $prodi->nama }}</h2>

                    <p class="code">
                        Kode program studi: {{ $prodi->kode }}
                    </p>

                    <p class="description">
                        {{ $prodi->deskripsi ?: 'Belum ada deskripsi program studi.' }}
                    </p>

                </article>
            @endforeach
        @endif

        <div class="disclaimer">
            <strong>Catatan:</strong>

            @if (($modeHasil ?? 'forward_chaining') === 'alternatif')
                Rekomendasi alternatif diurutkan berdasarkan kecocokan
                sebagian kondisi aturan. Hasil ini bukan bukti bahwa
                seluruh aturan Forward Chaining telah terpenuhi.
            @elseif (($modeHasil ?? 'forward_chaining') === 'alternatif_umum')
                Program studi yang ditampilkan merupakan pilihan awal
                karena aturan belum cukup untuk menghitung kecocokan.
                Urutan ini tidak menunjukkan tingkat kesesuaian minat.
            @else
                Rekomendasi dihasilkan dari aturan Forward Chaining
                yang cocok dengan jawabanmu.
            @endif

            Gunakan hasilnya sebagai bahan pertimbangan, bukan satu-satunya
            dasar dalam memilih program studi.
        </div>

        <a href="{{ route('home') }}" class="button">
            ← Kembali ke Beranda
        </a>

        <a href="{{ route('konsultasi.index') }}" class="button secondary">
            Ulangi Konsultasi
        </a>

    </section>
</main>

<footer>
    StudiMatch © 2026 · Sistem Pakar Rekomendasi Program Studi
</footer>

</body>
</html>
