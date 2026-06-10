<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassiFy</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Inter',sans-serif;
        }

        body{
            background:#f1f5f9;
            overflow-x:hidden;
            color:#0f172a;
        }

        /* =========================
            NAVBAR
        ========================== */

        .navbar-custom{
            padding:20px 0;
        }

        .brand{
            font-size:28px;
            font-weight:700;
            color:#0f172a;
        }

        .login-btn{
            background:#4f46e5;
            color:white;
            padding:12px 24px;
            border-radius:14px;
            text-decoration:none;
            font-weight:600;
            transition:0.3s;
        }

        .login-btn:hover{
            background:#4338ca;
            color:white;
        }

        /* =========================
            HERO
        ========================== */

        .hero{
            padding:90px 0;
            position:relative;
        }

        .hero h1{
            font-size:64px;
            font-weight:800;
            line-height:1.1;
            color:#0f172a;
        }

        .hero p{
            margin-top:20px;
            color:#64748b;
            font-size:18px;
            line-height:1.7;
        }

        .hero-btn{
            margin-top:35px;
            display:inline-flex;
            align-items:center;
            gap:10px;
            background:#4f46e5;
            color:white;
            padding:16px 28px;
            border-radius:18px;
            text-decoration:none;
            font-weight:600;
            transition:0.3s;
            box-shadow:0 10px 30px rgba(79,70,229,0.25);
        }

        .hero-btn:hover{
            transform:translateY(-3px);
            color:white;
        }

        /* =========================
            FLOATING CARD
        ========================== */

        .hero-card{
            background:white;
            border-radius:32px;
            padding:30px;
            box-shadow:0 15px 40px rgba(0,0,0,0.08);
            position:relative;
            overflow:hidden;
        }

        .hero-card::before{
            content:'';
            position:absolute;
            width:200px;
            height:200px;
            background:#4f46e5;
            opacity:0.08;
            border-radius:50%;
            top:-70px;
            right:-70px;
        }

        .stat-box{
            background:#f8fafc;
            border-radius:22px;
            padding:24px;
            margin-bottom:18px;
        }

        .stat-box small{
            color:#64748b;
            font-size:14px;
        }

        .stat-box h2{
            margin-top:8px;
            font-size:34px;
            font-weight:700;
            color:#0f172a;
        }

        /* =========================
            FEATURES
        ========================== */

        .section{
            padding:70px 0;
        }

        .section-title{
            text-align:center;
            margin-bottom:50px;
        }

        .section-title h2{
            font-size:42px;
            font-weight:800;
        }

        .section-title p{
            color:#64748b;
            margin-top:10px;
        }

        .feature-card{
            background:white;
            border-radius:28px;
            padding:32px;
            height:100%;
            transition:0.3s;
            box-shadow:0 8px 30px rgba(0,0,0,0.04);
        }

        .feature-card:hover{
            transform:translateY(-5px);
        }

        .feature-icon{
            width:70px;
            height:70px;
            border-radius:22px;
            background:rgba(79,70,229,0.1);
            color:#4f46e5;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:30px;
            margin-bottom:20px;
        }

        .feature-card h4{
            font-weight:700;
            margin-bottom:10px;
        }

        .feature-card p{
            color:#64748b;
            line-height:1.7;
        }

        /* =========================
    SUPPORT FLOAT
========================== */

.support-float{
    position:fixed;
    right:25px;
    bottom:25px;
    width:65px;
    height:65px;
    border:none;
    border-radius:50%;
    background:#4f46e5;
    color:white;
    font-size:28px;
    box-shadow:0 10px 30px rgba(79,70,229,0.35);
    z-index:999;
    transition:0.3s;
}

.support-float:hover{
    transform:translateY(-5px) scale(1.05);
    background:#4338ca;
}

        /* =========================
            FOOTER
        ========================== */

        footer{
            padding:30px 0;
            text-align:center;
            color:#64748b;
        }

        @media(max-width:768px){

            .hero{
                text-align:center;
                padding:60px 0;
            }

            .hero h1{
                font-size:42px;
            }

            .hero-card{
                margin-top:40px;
            }

        }

    </style>
</head>
<body>

    @php

    use App\Models\Setting;
    use App\Models\User;
    use App\Models\Kelas;
    use App\Models\Peminjaman;

    $setting = Setting::first();

    $totalUser = User::count();

    $totalKelas = Kelas::count();

    $todayPeminjaman = Peminjaman::whereDate('tanggal', now())->count();

@endphp

@if(session('success'))

<div class="position-fixed top-0 end-0 p-4"
     style="z-index:9999;">

    <div class="alert alert-success shadow rounded-4">

        {{ session('success') }}

    </div>

</div>

@endif

@if(session('error'))

<div class="position-fixed top-0 end-0 p-4"
     style="z-index:9999;">

    <div class="alert alert-danger shadow rounded-4">

        {{ session('error') }}

    </div>

</div>

@endif

<div class="container">

    <!-- NAVBAR -->
    <div class="navbar-custom d-flex justify-content-between align-items-center">

        <div class="brand">
    {{ $setting->system_name ?? 'ClassiFy' }}
</div>

<!-- RUNNING TEXT -->
<div class="bg-dark text-white py-2 overflow-hidden rounded-4">

    <marquee behavior="scroll"
             direction="left">

        📢 {{ $setting->running_text }}

    </marquee>

</div>


    </div>

    <!-- HERO -->
    <div class="hero">

        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-lg-6">

                <h1>
                    Sistem Peminjaman Kelas Modern
                </h1>

                <p>
                    {{ $setting->welcome_description }}
                </p>

                <a href="{{ route('login') }}" class="hero-btn">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Masuk Sekarang
                </a>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-6">

                <div class="hero-card">

                    <div class="stat-box">
                        <small>Total Ruangan</small>
                        <h2>{{ $totalKelas }}</h2>
                    </div>

                    <div class="stat-box">
                        <small>Peminjaman Hari Ini</small>
                        <h2>{{ $todayPeminjaman }}</h2>
                    </div>

                    <div class="stat-box">
                        <small>Status Sistem</small>
                        <h2 style="font-size:24px;color:#16a34a;">
                            {{ $setting->system_status }}
                        </h2>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- =========================
        ABOUT
========================== -->

<div class="section">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- LEFT -->
            <div class="col-lg-6">

                <div class="hero-card">

                    <div class="row g-3">

                        <div class="col-6">

                            <div class="stat-box">

                                <small>Total Pengguna</small>

                                <h2>{{ $totalUser }}</h2>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="stat-box">

                                <small>Total Kelas</small>

                                <h2>{{ $totalKelas }}</h2>

                            </div>

                        </div>

                        <div class="col-12">

                            <div class="stat-box">

                                <small>Status Sistem</small>

                                <h2 style="font-size:24px;color:#16a34a;">

                                    {{ $setting->system_status }}

                                </h2>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-6">

                <div class="section-title text-start mb-4">

                    <h2>
                        Tentang Kami
                    </h2>

                    <p>
                        Platform digital modern untuk mendukung
                        pengelolaan peminjaman ruang kelas kampus
                        secara efisien, aman, dan realtime.
                    </p>

                </div>

                <div class="feature-card">

                    <h4 class="mb-3">
                        Sistem Kampus Modern
                    </h4>

                    <p class="mb-4">

                        Sistem ini dirancang untuk membantu mahasiswa
                        dan pihak kampus dalam proses peminjaman kelas,
                        monitoring penggunaan ruangan,
                        serta pengelolaan aktivitas kampus secara digital.

                    </p>

                    <div class="d-flex flex-column gap-3">

                        <div class="d-flex align-items-center gap-3">

                            <div class="feature-icon"
                                 style="width:55px;height:55px;font-size:22px;">

                                <i class="bi bi-check-circle"></i>

                            </div>

                            <div>

                                <strong>
                                    Monitoring Realtime
                                </strong>

                                <div class="text-muted small">
                                    Pantau aktivitas peminjaman secara langsung
                                </div>

                            </div>

                        </div>

                        <div class="d-flex align-items-center gap-3">

                            <div class="feature-icon"
                                 style="width:55px;height:55px;font-size:22px;">

                                <i class="bi bi-building"></i>

                            </div>

                            <div>

                                <strong>
                                    Pengelolaan Ruangan
                                </strong>

                                <div class="text-muted small">
                                    Data kelas dan gedung lebih terorganisir
                                </div>

                            </div>

                        </div>

                        <div class="d-flex align-items-center gap-3">

                            <div class="feature-icon"
                                 style="width:55px;height:55px;font-size:22px;">

                                <i class="bi bi-shield-check"></i>

                            </div>

                            <div>

                                <strong>
                                    Sistem Aman
                                </strong>

                                <div class="text-muted small">
                                    Mendukung autentikasi dan validasi data
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- =========================
    FAQ
========================== -->

<div class="section">

    <div class="container">

        <div class="section-title">

            <h2>
                Pertanyaan Umum
            </h2>

            <p>
                Beberapa pertanyaan yang sering ditanyakan pengguna
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="accordion"
                     id="faqAccordion">

                    <!-- ITEM -->
                    <div class="accordion-item mb-3 border-0 rounded-4 shadow-sm overflow-hidden">

                        <h2 class="accordion-header">

                            <button class="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq1">

                                Bagaimana cara melakukan peminjaman kelas?

                            </button>

                        </h2>

                        <div id="faq1"
                             class="accordion-collapse collapse show"
                             data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Login ke sistem, pilih kelas,
                                lalu isi form peminjaman.

                            </div>

                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="accordion-item mb-3 border-0 rounded-4 shadow-sm overflow-hidden">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq2">

                                Apakah peminjaman langsung disetujui?

                            </button>

                        </h2>

                        <div id="faq2"
                             class="accordion-collapse collapse"
                             data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Tidak, pengajuan akan diverifikasi admin terlebih dahulu.

                            </div>

                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="accordion-item border-0 rounded-4 shadow-sm overflow-hidden">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq3">

                                Bagaimana jika terjadi kendala sistem?

                            </button>

                        </h2>

                        <div id="faq3"
                             class="accordion-collapse collapse"
                             data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Gunakan fitur Hubungi Admin untuk mengirim laporan.

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- =========================
    TESTIMONI
========================== -->

<div class="section bg-white">

    <div class="container">

        <div class="section-title">

            <h2>
                Apa Kata Pengguna?
            </h2>

            <p>
                Pengalaman mahasiswa menggunakan sistem
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-card">

                    <p>
                        “Sistemnya sangat membantu dan proses peminjaman jadi jauh lebih cepat.”
                    </p>

                    <div class="mt-4">

                        <strong>
                            Elvando
                        </strong>

                        <div class="text-muted small">
                            Mahasiswa
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <p>
                        “UI modern dan mudah digunakan bahkan dari HP.”
                    </p>

                    <div class="mt-4">

                        <strong>
                            Randi
                        </strong>

                        <div class="text-muted small">
                            Ketua Kelas
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <p>
                        “Pengelolaan ruangan sekarang jauh lebih terorganisir.”
                    </p>

                    <div class="mt-4">

                        <strong>
                            Admin Kampus
                        </strong>

                        <div class="text-muted small">
                            Administrator
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- =========================
    TEAM
========================== -->

<div class="section">

    <div class="container">

        <div class="section-title">

            <h2>
                Tim Developer
            </h2>

            <p>
                Pengembang sistem peminjaman kampus
            </p>

        </div>

        <div class="row justify-content-center g-4">

            <div class="col-md-4">

                <div class="feature-card text-center">

                    <div class="feature-icon mx-auto">
                        <i class="bi bi-person"></i>
                    </div>

                    <h4>
                        Elvando
                    </h4>

                    <p>
                        Fullstack Developer & UI Designer
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- =========================
    CONTACT
========================== -->

<!-- =========================
    CONTACT
========================== -->

<div class="section bg-white">

    <div class="container">

        <div class="section-title">

            <h2>
                Kontak Kampus
            </h2>

            <p>
                Informasi dan layanan kampus
            </p>

        </div>

        <div class="row g-4">

            <!-- LOKASI -->
            <div class="col-md-4">

                <a href="{{ $setting->maps_link }}"
                   target="_blank"
                   class="text-decoration-none text-dark">

                    <div class="feature-card text-center">

                        <div class="feature-icon mx-auto">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <h4>
                            Lokasi
                        </h4>

                        <p>
                            {{ $setting->campus_address }}
                        </p>

                    </div>

                </a>

            </div>

            <!-- EMAIL -->
            <div class="col-md-4">

                <a href="mailto:{{ $setting->support_email }}"
                   class="text-decoration-none text-dark">

                    <div class="feature-card text-center">

                        <div class="feature-icon mx-auto">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <h4>
                            Email
                        </h4>

                        <p>
                            {{ $setting->support_email }}
                        </p>

                    </div>

                </a>

            </div>

            <!-- PHONE -->
            <div class="col-md-4">

                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->support_phone) }}"
                   target="_blank"
                   class="text-decoration-none text-dark">

                    <div class="feature-card text-center">

                        <div class="feature-icon mx-auto">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <h4>
                            Telepon
                        </h4>

                        <p>
                            {{ $setting->support_phone }}
                        </p>

                    </div>

                </a>

            </div>

        </div>

    </div>

</div>



<!-- FEATURES -->
<div class="section">

    <div class="container">

        <div class="section-title">

            <h2>
                Kenapa Menggunakan Sistem Ini?
            </h2>

            <p>
                Sistem dirancang modern untuk kebutuhan kampus digital
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <h4>
                        Cepat & Praktis
                    </h4>

                    <p>
                        Ajukan peminjaman hanya dalam beberapa langkah mudah.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h4>
                        Aman
                    </h4>

                    <p>
                        Sistem dilengkapi autentikasi dan monitoring realtime.
                    </p>

                </div>

            </div>

            <!-- PENGUMUMAN -->
<div class="col-md-4">

    <div class="feature-card">

        <div class="feature-icon">
            <i class="bi bi-megaphone"></i>
        </div>

        <h4>
            Pengumuman Kampus
        </h4>

        @forelse($pengumuman as $item)

            <div class="announcement-item mb-3 pb-3 border-bottom">

                <strong class="d-block mb-1">
                    {{ $item->judul }}
                </strong>

                <small class="text-secondary">
                    {{ $item->isi }}
                </small>

            </div>

        @empty

            <div class="announcement-item">

                <small class="text-secondary">
                    Belum ada pengumuman terbaru.
                </small>

            </div>

        @endforelse

    </div>

</div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-phone"></i>
                    </div>

                    <h4>
                        Responsive
                    </h4>

                    <p>
                        Bisa digunakan dari laptop maupun smartphone.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>


<footer>
    © 2026 {{ $setting->system_name }} — Sistem Peminjaman Kelas
</footer>

<!-- =========================
    SUPPORT MODAL
========================== -->

<div class="modal fade"
     id="supportModal"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content border-0 rounded-5 overflow-hidden">

            <!-- HEADER -->
            <div class="p-4 text-white"
                 style="background:linear-gradient(135deg,#4f46e5,#4338ca);">

                <h3 class="fw-bold mb-1">

                    Hubungi Admin

                </h3>

                <small>
                    Laporkan kendala atau masalah sistem
                </small>

            </div>

            <!-- BODY -->
            <div class="p-4">

                <form action="{{ route('support.send') }}"
                      method="POST">

                    @csrf

                    <div class="row">

                        <!-- NAMA -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">

                                Nama 

                            </label>

                            <input type="text"
                                   name="nama"
                                   class="form-control rounded-4"
                                   required>

                        </div>

                        <!-- HP -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">

                                Nomor HP

                            </label>

                            <input type="text"
                                   name="nomor"
                                   class="form-control rounded-4"
                                   required>

                        </div>

                        <!-- KATEGORI -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label fw-semibold">

                                Jenis Kendala

                            </label>

                            <select name="kategori"
                                    class="form-select rounded-4"
                                    required>

                                <option value="">
                                    Pilih Kendala
                                </option>

                                <option>
                                    Tidak Bisa Login
                                </option>

                                <option>
                                    Error Sistem
                                </option>

                                <option>
                                    Peminjaman Bermasalah
                                </option>

                                <option>
                                    Bug Tampilan
                                </option>

                                <option>
                                    Laporan Lainnya
                                </option>

                            </select>

                        </div>

                        <!-- PESAN -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label fw-semibold">

                                Detail Kendala

                            </label>

                            <textarea name="pesan"
                                      rows="5"
                                      class="form-control rounded-4"
                                      placeholder="Jelaskan kendala yang dialami..."
                                      required></textarea>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button class="btn w-100 text-white rounded-4 py-3 fw-semibold"
                            style="background:#4f46e5;">

                        Kirim Laporan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- FLOATING SUPPORT -->

<button class="support-float"
        data-bs-toggle="modal"
        data-bs-target="#supportModal">

    <i class="bi bi-headset"></i>

</button>

</body>
</html>