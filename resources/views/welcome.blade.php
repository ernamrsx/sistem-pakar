<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudiMatch — Sistem Pakar Program Studi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
            --white: #ffffff;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
            background: #faf9ff;
        }

        button, input { font: inherit; }
        button { cursor: pointer; }

        .navbar {
            min-height: 76px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
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
            background: var(--purple);
            color: white;
            border-radius: 12px;
        }

        .logo span { color: var(--purple); }

        .nav-tag {
            font-size: 12px;
            padding: 9px 13px;
            background: var(--purple-light);
            color: var(--purple-dark);
            border-radius: 30px;
            font-weight: 700;
        }

        .hero {
            max-width: 1150px;
            margin: auto;
            padding: 82px 28px 70px;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            align-items: center;
            gap: 55px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--purple-dark);
            background: var(--purple-light);
            border-radius: 30px;
            padding: 9px 14px;
            font-size: 12px;
            font-weight: 700;
        }

        h1, h2, h3, p { margin-top: 0; }

        h1 {
            font: 800 clamp(37px, 5vw, 57px)/1.15 'Plus Jakarta Sans', sans-serif;
            letter-spacing: -2.5px;
            margin: 23px 0 18px;
        }

        h1 span { color: var(--purple); }

        .hero-copy {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.9;
            max-width: 490px;
        }

        .primary-btn {
            border: 0;
            color: white;
            background: var(--purple);
            padding: 15px 23px;
            border-radius: 13px;
            font-weight: 700;
            box-shadow: 0 8px 22px #7054df30;
            transition: .2s;
        }

        .primary-btn:hover {
            background: var(--purple-dark);
            transform: translateY(-2px);
        }

        .primary-btn:disabled {
            opacity: .45;
            cursor: not-allowed;
            transform: none;
        }

        .hero-note {
            display: block;
            margin-top: 15px;
            color: var(--muted);
            font-size: 12px;
        }

        .visual {
            background: linear-gradient(145deg, #eee9ff, #dcd4ff);
            min-height: 345px;
            border-radius: 32px;
            padding: 28px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .visual-card {
            background: white;
            border: 1px solid white;
            padding: 25px;
            width: 100%;
            max-width: 330px;
            border-radius: 23px;
            box-shadow: 0 20px 60px #4935a51c;
            transform: rotate(-2deg);
        }

        .visual-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: var(--purple-light);
            font-size: 24px;
            margin-bottom: 18px;
        }

        .visual-card h3 { margin-bottom: 8px; }
        .visual-card p { color: var(--muted); font-size: 13px; line-height: 1.7; }

        .mini-option {
            padding: 12px;
            border: 1px solid var(--line);
            border-radius: 11px;
            margin-top: 9px;
            font-size: 12px;
        }

        .mini-option.active {
            border-color: var(--purple);
            background: var(--purple-light);
            color: var(--purple-dark);
        }

        .features {
            background: white;
            padding: 58px 7%;
            border-top: 1px solid var(--line);
        }

        .section-title { text-align: center; margin-bottom: 35px; }

        .section-title h2 {
            font: 800 28px 'Plus Jakarta Sans', sans-serif;
            letter-spacing: -1px;
        }

        .section-title p { color: var(--muted); font-size: 14px; }

        .feature-grid {
            max-width: 1050px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature {
            padding: 25px;
            border: 1px solid var(--line);
            border-radius: 18px;
        }

        .feature-icon { font-size: 25px; margin-bottom: 17px; }
        .feature h3 { font-size: 16px; }
        .feature p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 0;
        }

        .page {
            display: none;
            min-height: 70vh;
            padding: 55px 20px 75px;
        }

        .page.active { display: block; }

        .quiz-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 25px;
            padding: 35px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 15px 45px #392a7010;
        }

        .back-btn {
            background: transparent;
            border: 0;
            color: var(--muted);
            padding: 8px 0;
            margin-bottom: 20px;
        }

        .name-field { margin: 22px 0 26px; }

        .name-field label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .name-field input {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 13px 14px;
            outline: none;
            color: var(--ink);
            background: white;
        }

        .name-field input:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 3px #7054df18;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: var(--muted);
            font-size: 12px;
            margin: 15px 0 10px;
        }

        .progress-track {
            height: 7px;
            background: #efedf6;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .progress-fill {
            height: 100%;
            background: var(--purple);
            border-radius: 10px;
            transition: width .25s;
        }

        .question-number {
            color: var(--purple);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .question-title {
            font: 700 27px/1.4 'Plus Jakarta Sans', sans-serif;
            margin: 14px 0 10px;
            letter-spacing: -.8px;
        }

        .question-hint {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .answer-btn {
            display: flex;
            width: 100%;
            align-items: center;
            gap: 13px;
            text-align: left;
            border: 1px solid var(--line);
            background: white;
            padding: 17px;
            border-radius: 14px;
            margin-top: 12px;
            transition: .2s;
            color: var(--ink);
        }

        .answer-btn:hover, .answer-btn.selected {
            border-color: var(--purple);
            background: #f7f5ff;
        }

        .answer-symbol {
            width: 35px;
            height: 35px;
            flex-shrink: 0;
            border-radius: 11px;
            background: #f2f0f8;
            display: grid;
            place-items: center;
            font-weight: 800;
        }

        .answer-btn.selected .answer-symbol {
            background: var(--purple);
            color: white;
        }

        .answer-text strong { display: block; font-size: 14px; }
        .answer-text small { color: var(--muted); font-size: 12px; }

        .quiz-actions {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 28px;
        }

        .secondary-btn {
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 13px 18px;
            background: white;
            color: var(--ink);
            font-weight: 600;
        }

        .error-message {
            padding: 13px 15px;
            margin: 15px 0;
            border-radius: 12px;
            color: #a52a3a;
            background: #fff0f1;
            border: 1px solid #ffdadd;
            font-size: 13px;
            line-height: 1.6;
        }

        footer {
            padding: 27px 20px;
            text-align: center;
            color: var(--muted);
            font-size: 12px;
            background: #faf9ff;
            border-top: 1px solid var(--line);
        }

        @media (max-width: 750px) {
            .hero {
                grid-template-columns: 1fr;
                padding-top: 55px;
                gap: 35px;
            }

            .visual { min-height: 300px; }
            .feature-grid { grid-template-columns: 1fr; }
            .quiz-card { padding: 23px; }
            .question-title { font-size: 23px; }
            .navbar { padding: 15px 5%; }
            .nav-tag { font-size: 10px; text-align: center; }
            .quiz-actions { align-items: stretch; }
            .quiz-actions button { padding: 12px; }
        }
        /* PROFILE PAGE */
        .profile-container {
            text-align: center;
            max-width: 500px;
            margin: 30px auto 0;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: var(--purple-light);
            display: grid;
            place-items: center;
            font-size: 40px;
        }

        .profile-description {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 30px;
        }

        .profile-detail {
            text-align: left;
            padding: 18px;
            border: 1px solid var(--line);
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .profile-detail strong {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
        }

        .profile-detail span {
            color: var(--muted);
            font-size: 14px;
        }

        .profile-container .primary-btn {
            margin-top: 20px;
            width: 100%;
        }
            </style>
        </head>
        <body>

        <header class="navbar">
            <div class="logo">
                <div class="logo-icon">S</div>
                Studi<span>Match</span>
            </div>

            <div style="display:flex; align-items:center; gap:12px;">
                <button class="secondary-btn"
                        type="button"
                        onclick="showPage('profile')">
                    👤 Profil Saya
                </button>

                <div class="nav-tag">
                    Sistem Pakar · Forward Chaining
                </div>
            </div>
        </header>

<main>
    <!-- HALAMAN BERANDA -->
    <section id="home" class="page active">
        <div class="hero">
            <div>
                <div class="eyebrow">✦ TEMUKAN POTENSI TERBAIKMU</div>
                <h1>Temukan Program Studi yang <span>Sesuai Dirimu.</span></h1>
                <p class="hero-copy">
                    Kenali minat dan bakatmu melalui tes sederhana.
                    Dapatkan gambaran program studi yang bisa kamu
                    pertimbangkan untuk masa depanmu.
                </p>

                <button type="button" class="primary-btn" onclick="startQuiz()">
                    Mulai Tes Sekarang &nbsp; →
                </button>

                <span class="hero-note">♡ Jawab pertanyaan dengan jujur sesuai dirimu.</span>
            </div>

            <div class="visual">
                <div class="visual-card">
                    <div class="visual-icon">🎓</div>
                    <h3>Masa depanmu dimulai dari sini</h3>
                    <p>Jawab pertanyaan mengenai minat, kebiasaan, dan kemampuanmu.</p>
                    <div class="mini-option active">✓ &nbsp; Analisis minat dan bakat</div>
                    <div class="mini-option">◇ &nbsp; Kenali potensi diri</div>
                    <div class="mini-option">✧ &nbsp; Eksplorasi program studi</div>
                </div>
            </div>
        </div>

        <section class="features">
            <div class="section-title">
                <h2>Bagaimana cara kerjanya?</h2>
                <p>Tiga langkah sederhana untuk mulai mengenali pilihan studimu.</p>
            </div>

            <div class="feature-grid">
                <div class="feature">
                    <div class="feature-icon">📝</div>
                    <h3>01. Jawab Pertanyaan</h3>
                    <p>Jawab pertanyaan seputar minat dan kecenderungan kemampuanmu.</p>
                </div>

                <div class="feature">
                    <div class="feature-icon">🧠</div>
                    <h3>02. Proses Penalaran</h3>
                    <p>Jawaban akan dicocokkan dengan fakta dan aturan sistem pakar.</p>
                </div>

                <div class="feature">
                    <div class="feature-icon">🎯</div>
                    <h3>03. Lihat Rekomendasi</h3>
                    <p>Kenali program studi yang dapat kamu pertimbangkan lebih lanjut.</p>
                </div>
            </div>
        </section>
    </section>

        <!-- HALAMAN PROFIL -->
    <section id="profile" class="page">
        <div class="quiz-card">

            <button type="button" class="back-btn"
                    onclick="goHome()">
                ← Kembali ke Beranda
            </button>

            <div class="eyebrow">✦ PROFIL PENGGUNA</div>

            <div class="profile-container">

                <div class="profile-avatar">
                    👤
                </div>

                <h2>Profil Saya</h2>

                <p class="profile-description">
                    Informasi akun pengguna StudiMatch.
                </p>

                <div class="profile-detail">
                    <strong>Nama Pengguna</strong>
                    <span>
                        {{ auth()->user()?->name ?? 'Pengguna StudiMatch' }}
                    </span>
                </div>

                <div class="profile-detail">
                    <strong>Email</strong>
                    <span>
                        {{ auth()->user()?->email ?? 'Belum tersedia' }}
                    </span>
                </div>

                <div class="profile-detail">
                    <strong>Status Akun</strong>
                    <span>
                        {{ auth()->check() ? 'Terdaftar' : 'Pengguna Tamu' }}
                    </span>
                </div>

                <button type="button"
                        class="primary-btn"
                        onclick="startQuiz()">
                    Mulai Tes Minat dan Bakat →
                </button>

            </div>
        </div>
    </section>
    <!-- HALAMAN KONSULTASI -->
    <section id="quiz" class="page">
        <div class="quiz-card">
            <button type="button" class="back-btn" onclick="goHome()">
                ← Kembali ke Beranda
            </button>

            <div class="eyebrow">✦ TES MINAT DAN BAKAT</div>

            @if ($errors->any())
                <div class="error-message">
                    <strong>Periksa kembali jawabanmu.</strong>
                    <ul style="margin:8px 0 0;padding-left:20px">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            <form id="consultationForm"
                  method="POST"
                  action="{{ route('konsultasi.proses') }}">
                @csrf

                <div class="name-field">
                    <label for="nama_pengguna">Nama kamu (opsional)</label>
                    <input
                        type="text"
                        id="nama_pengguna"
                        name="nama_pengguna"
                        maxlength="255"
                        value="{{ old('nama_pengguna') }}"
                        placeholder="Masukkan nama kamu"
                    >
                </div>

                <div class="progress-info">
                    <span id="questionCount">Pertanyaan 1 dari {{ $questions->count() }}</span>
                    <span id="progressPercent">0%</span>
                </div>

                <div class="progress-track">
                    <div class="progress-fill" id="progressFill" style="width:0%"></div>
                </div>

                <div class="question-number" id="questionNumber">PERTANYAAN 01</div>
                <h2 class="question-title" id="questionTitle"></h2>
                <p class="question-hint">
                    Pilih jawaban yang paling sesuai dengan dirimu.
                </p>

                <div id="answerOptions"></div>

                <!-- Input jawaban dibuat oleh JavaScript saat formulir dikirim -->
                <div id="hiddenAnswers"></div>

                <div class="quiz-actions">
                    <button
                        type="button"
                        class="secondary-btn"
                        id="prevBtn"
                        onclick="previousQuestion()">
                        ← Sebelumnya
                    </button>

                    <button
                        type="button"
                        class="primary-btn"
                        id="nextBtn"
                        onclick="nextQuestion()"
                        disabled>
                        Selanjutnya →
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>

<footer>
    StudiMatch © 2026 · Sistem Pakar Rekomendasi Program Studi
</footer>

<script>
    /*
     * Data pertanyaan berasal dari database melalui route Home.
     * Pastikan route mengirim variabel $questions ke view ini.
     */
    const questions = @json(
        $questions->map(function ($question) {
            return [
                'kode' => $question->kode,
                'text' => $question->teks,
            ];
        })->values()
    );

    let currentQuestion = 0;

    // Jawaban disimpan berdasarkan kode pertanyaan, bukan nomor urut.
    // Nilai 1 = Ya, nilai 0 = Tidak.
    let answers = {};

    function showPage(pageId) {
        document.querySelectorAll(".page").forEach(page => {
            page.classList.remove("active");
        });

        document.getElementById(pageId).classList.add("active");
        window.scrollTo({ top: 0, behavior: "smooth" });
    }

    function goHome() {
        showPage("home");
    }

    function startQuiz() {
        if (questions.length === 0) {
            alert("Pertanyaan belum tersedia. Silakan coba lagi nanti.");
            return;
        }

        currentQuestion = 0;
        answers = {};

        document.getElementById("nama_pengguna").value = "";
        document.getElementById("hiddenAnswers").innerHTML = "";

        showPage("quiz");
        renderQuestion();
    }

    function renderQuestion() {
        if (questions.length === 0) return;

        const question = questions[currentQuestion];
        const total = questions.length;
        const progress = Math.round(((currentQuestion + 1) / total) * 100);

        document.getElementById("questionCount").textContent =
            `Pertanyaan ${currentQuestion + 1} dari ${total}`;

        document.getElementById("progressPercent").textContent =
            `${progress}%`;

        document.getElementById("progressFill").style.width =
            `${progress}%`;

        document.getElementById("questionNumber").textContent =
            `PERTANYAAN ${String(currentQuestion + 1).padStart(2, "0")}`;

        document.getElementById("questionTitle").textContent =
            question.text;

        const options = document.getElementById("answerOptions");
        options.innerHTML = "";

        const answerChoices = [
            {
                value: "1",
                symbol: "✓",
                label: "Ya, sesuai",
                description: "Pernyataan ini sesuai dengan minat atau dirimu."
            },
            {
                value: "0",
                symbol: "×",
                label: "Tidak, kurang sesuai",
                description: "Pernyataan ini kurang sesuai dengan dirimu."
            }
        ];

        answerChoices.forEach(option => {
            const button = document.createElement("button");
            button.type = "button";

            button.className = "answer-btn" +
                (answers[question.kode] === option.value ? " selected" : "");

            const symbol = document.createElement("span");
            symbol.className = "answer-symbol";
            symbol.textContent = option.symbol;

            const text = document.createElement("span");
            text.className = "answer-text";

            const strong = document.createElement("strong");
            strong.textContent = option.label;

            const small = document.createElement("small");
            small.textContent = option.description;

            text.appendChild(strong);
            text.appendChild(small);

            button.appendChild(symbol);
            button.appendChild(text);

            button.addEventListener("click", () => {
                answers[question.kode] = option.value;
                renderQuestion();
            });

            options.appendChild(button);
        });

        document.getElementById("prevBtn").style.visibility =
            currentQuestion === 0 ? "hidden" : "visible";

        const next = document.getElementById("nextBtn");

        next.disabled = answers[question.kode] === undefined;

        next.textContent = currentQuestion === total - 1
            ? "Kirim Jawaban →"
            : "Selanjutnya →";
    }

    function previousQuestion() {
        if (currentQuestion > 0) {
            currentQuestion--;
            renderQuestion();
        }
    }

    function nextQuestion() {
        const question = questions[currentQuestion];

        if (!question || answers[question.kode] === undefined) {
            return;
        }

        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            renderQuestion();
        } else {
            submitConsultation();
        }
    }

    function submitConsultation() {
        // Pastikan semua pertanyaan sudah dijawab.
        const unanswered = questions.find(question =>
            answers[question.kode] !== "0" &&
            answers[question.kode] !== "1"
        );

        if (unanswered) {
            currentQuestion = questions.findIndex(question =>
                question.kode === unanswered.kode
            );

            renderQuestion();
            alert("Jawab semua pertanyaan terlebih dahulu.");
            return;
        }

        const hiddenAnswers = document.getElementById("hiddenAnswers");
        hiddenAnswers.innerHTML = "";

        // Format sesuai controller: jawaban[KODE] = 0 atau 1.
        questions.forEach(question => {
            const input = document.createElement("input");

            input.type = "hidden";
            input.name = `jawaban[${question.kode}]`;
            input.value = answers[question.kode];

            hiddenAnswers.appendChild(input);
        });

        const nextButton = document.getElementById("nextBtn");
        nextButton.disabled = true;
        nextButton.textContent = "Memproses...";

        // Kirim ke KonsultasiController::proses untuk Forward Chaining.
        document.getElementById("consultationForm").submit();
    }

    // Jika Laravel mengembalikan pengguna ke halaman ini karena validasi,
    // tampilkan kembali halaman konsultasi.
    @if ($errors->any() || session('error'))
        showPage("quiz");
    @endif

    // Inisialisasi tampilan pertanyaan pertama.
    if (questions.length > 0) {
        renderQuestion();
    } else {
        document.getElementById("questionTitle").textContent =
            "Pertanyaan belum tersedia.";
        document.getElementById("nextBtn").disabled = true;
    }
</script>

</body>
</html>
