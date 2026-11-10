<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Program Studi</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f3ff;
            color: #25233a;
        }
        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 25px;
        }
        .header {
            background: #6554c0;
            color: white;
            padding: 28px;
            border-radius: 16px;
            margin-bottom: 22px;
        }
        .header h1 { margin-top: 0; }
        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            margin-bottom: 16px;
            box-shadow: 0 3px 12px #2420440d;
        }
        .question { font-weight: bold; margin-bottom: 14px; }
        .option { margin-right: 22px; cursor: pointer; }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            background: #6554c0;
            color: white;
            padding: 14px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover { background: #5141a4; }
        .error { color: #b42318; margin-bottom: 15px; }
        .category { color: #6554c0; font-size: 13px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Temukan Program Studi yang Cocok</h1>
        <p>Jawab pertanyaan berikut sesuai minat dan preferensi kamu.</p>
        <p>Sistem akan memberikan rekomendasi menggunakan metode Forward Chaining.</p>
    </div>

    @if (session('error'))
        <div class="card error">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="card error">
            <strong>Periksa kembali jawaban kamu:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($pertanyaan->isEmpty())
        <div class="card">
            Pertanyaan belum tersedia. Data pertanyaan perlu dimasukkan ke database terlebih dahulu.
        </div>
    @else
        <form action="{{ route('konsultasi.proses') }}" method="POST">
            @csrf

            <div class="card">
                <label for="nama_pengguna"><strong>Nama kamu (opsional)</strong></label>
                <input
                    type="text"
                    id="nama_pengguna"
                    name="nama_pengguna"
                    value="{{ old('nama_pengguna') }}"
                    placeholder="Masukkan nama"
                >
            </div>

            @foreach ($pertanyaan as $item)
                <div class="card">
                    <div class="category">
                        {{ $item->kategori ?? 'Pertanyaan konsultasi' }}
                    </div>

                    <p class="question">
                        {{ $loop->iteration }}. {{ $item->teks }}
                    </p>

                    <label class="option">
                        <input
                            type="radio"
                            name="jawaban[{{ $item->kode }}]"
                            value="1"
                            required
                            {{ old('jawaban.'.$item->kode) === '1' ? 'checked' : '' }}
                        >
                        Ya
                    </label>

                    <label class="option">
                        <input
                            type="radio"
                            name="jawaban[{{ $item->kode }}]"
                            value="0"
                            required
                            {{ old('jawaban.'.$item->kode) === '0' ? 'checked' : '' }}
                        >
                        Tidak
                    </label>
                </div>
            @endforeach

            <button type="submit">Lihat Rekomendasi</button>
        </form>
    @endif
</div>
</body>
</html>