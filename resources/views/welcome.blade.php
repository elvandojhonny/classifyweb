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

        .hero-card{
    background: linear-gradient(135deg,#ffffff,#f8fafc);
    border-radius: 28px;
    padding: 40px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.06);
    border: 1px solid #eef2f7;
}

.mini-info-card{
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    padding: 14px 18px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    color: #334155;
}

.mini-info-card i{
    font-size: 18px;
    color: #2563eb;
}

.hero-card h2{
    font-size: 34px;
    color: #0f172a;
}

.hero-card p{
    font-size: 15px;
}


        /* =========================
            SCROLL ANIMATION
        ========================== */

        .reveal{
            opacity: 0;
            transform: translateY(80px);
            transition: all 1s ease;
        }

        .reveal.active{
            opacity: 1;
            transform: translateY(0);
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

        .schedule-card{
    background:white;
    border-radius:24px;
    padding:22px;
    height:100%;
    border:1px solid #e2e8f0;
    box-shadow:0 8px 20px rgba(0,0,0,.04);
    transition:.3s;
}

.schedule-card:hover{
    transform:translateY(-4px);
}

.schedule-time{
    font-size:24px;
    font-weight:700;
    color:#4f46e5;
}

.schedule-room{
    font-size:18px;
    font-weight:700;
    color:#0f172a;
    margin-top:10px;
}

.schedule-info{
    color:#64748b;
    font-size:14px;
    margin-top:4px;
}

.schedule-user{
    margin-top:15px;
    padding-top:15px;
    border-top:1px solid #e2e8f0;
}

.schedule-status{
    margin-top:15px;
}

.jadwal-card{
    background:white;
    border-radius:22px;
    padding:20px;
    border:1px solid #e2e8f0;
    box-shadow:0 8px 20px rgba(0,0,0,.04);
    height:100%;
    transition:.3s;
}

.jadwal-card:hover{
    transform:translateY(-4px);
}

.jadwal-title{
    font-size:18px;
    font-weight:700;
    color:#0f172a;
}

.jadwal-sub{
    color:#64748b;
    font-size:13px;
}

.jadwal-info{
    margin-top:15px;
}

.jadwal-info div{
    margin-bottom:8px;
    font-size:14px;
}

.badge-pending{
    background:#fef3c7;
    color:#d97706;
}

.badge-disetujui{
    background:#dcfce7;
    color:#16a34a;
}

.badge-ditolak{
    background:#fee2e2;
    color:#dc2626;
}

.jadwal-wrapper{
    background:white;
    border-radius:24px;
    border:1px solid #e2e8f0;
    box-shadow:0 8px 24px rgba(0,0,0,.05);

    max-height:420px;
    overflow-y:auto;
}

.jadwal-wrapper::-webkit-scrollbar{
    width:8px;
}

.jadwal-wrapper::-webkit-scrollbar-thumb{
    background:#cbd5e1;
    border-radius:20px;
}

.jadwal-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;

    padding:18px 24px;
    border-bottom:1px solid #e2e8f0;
}

.jadwal-row:last-child{
    border-bottom:none;
}

.jadwal-left{
    width:25%;
}

.jadwal-center{
    width:40%;
    font-size:14px;
}

.jadwal-right{
    width:25%;
    text-align:right;
    font-size:14px;
}

.jadwal-title{
    font-size:17px;
    font-weight:700;
    color:#0f172a;
}

.jadwal-sub{
    font-size:13px;
    color:#64748b;
}

@media(max-width:768px){

    .jadwal-row{
        flex-direction:column;
        align-items:flex-start;
    }

    .jadwal-left,
    .jadwal-center,
    .jadwal-right{
        width:100%;
        text-align:left;
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

    $peminjamanTerbaru = Peminjaman::with([
    'user.fakultas',
    'kelas.gedung'
    ])
    ->whereIn('status', ['pending','disetujui'])
    ->orderBy('tanggal')
    ->orderBy('jam_mulai')
    ->take(12)
    ->get();

    $sedangDipakai = Peminjaman::with([
    'user.fakultas',
    'kelas.gedung'
    ])
    ->where('status','disetujui')
    ->whereDate('tanggal', now())
    ->where('jam_mulai','<=', now()->format('H:i:s'))
    ->where('jam_selesai','>=', now()->format('H:i:s'))
    ->get();

    $jadwalHariIni = Peminjaman::with([
    'user.fakultas',
    'kelas.gedung.fakultas'
    ])
    ->whereIn('status', [
        'pending',
        'disetujui'
    ])

    ->where(function($q){

        $q->where('tanggal', '>', now()->toDateString())

        ->orWhere(function($qq){

                $qq->where(
                    'tanggal',
                    now()->toDateString()
                )

                ->where(
                    'jam_selesai',
                    '>',
                    now()->format('H:i:s')
                );

        });

    })

    ->orderBy('tanggal')
    ->orderBy('jam_mulai')
    ->get();

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



</div>

<!-- RUNNING TEXT -->
<div class="bg-dark text-white py-2 overflow-hidden rounded-4">

    <marquee behavior="scroll"
             direction="left">

        📢 {{ $setting->running_text }}

    </marquee>

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

    <div class="hero-card position-relative overflow-hidden">

        <div class="mb-4">

            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                Sistem Aktif
            </span>

        </div>

        <h2 class="fw-bold mb-3">
            Selamat Datang 👋
        </h2>

        <p class="text-secondary mb-4" style="line-height:1.8;">
            Sistem peminjaman ruangan kampus membantu proses
            reservasi menjadi lebih cepat, praktis, dan terorganisir.
        </p>

        <div class="d-flex flex-wrap gap-3">

            <div class="mini-info-card">
                <i class="bi bi-building"></i>
                <span>{{ $totalKelas }} Ruangan</span>
            </div>

            <div class="mini-info-card">
                <i class="bi bi-shield-check"></i>
                <span>{{ $setting->system_status }}</span>
            </div>

            <div class="mini-info-card">
                <i class="bi bi-calendar2-check"></i>
                <span>Booking Online</span>
            </div>

        </div>

    </div>

</div>
        </div>

    </div>

</div>


<!-- =========================
    JADWAL PEMINJAMAN
========================== -->

<div class="section">

    <div class="container">

        <div class="section-title">

            <h2>
                Jadwal Peminjaman
            </h2>

            <p>
                Semua jadwal peminjaman aktif dan yang akan datang
            </p>

        </div>

        <div class="jadwal-wrapper">

            @forelse($jadwalHariIni as $item)

            <div class="jadwal-row">

                <div class="jadwal-left">

                    <div class="jadwal-title">
                        {{ $item->kelas->nama_kelas }}
                    </div>

                    <div class="jadwal-sub">
                        {{ $item->kelas->gedung->nama_gedung }}
                    </div>

                    <div class="jadwal-sub">
                        {{ $item->kelas->gedung->fakultas->nama_fakultas ?? '-' }}
                    </div>

                </div>

                <div class="jadwal-center">

                    <div>
                        👤 <strong>{{ $item->user->name }}</strong>
                    </div>

                    <div>
                        🎓 {{ $item->user->prodi }}
                    </div>

                    <div>
                        🏢 {{ $item->user->fakultas->nama_fakultas ?? '-' }}
                    </div>

                </div>

                <div class="jadwal-right">

                    <div>
                        🕒
                        {{ substr($item->jam_mulai,0,5) }}
                        -
                        {{ substr($item->jam_selesai,0,5) }}
                    </div>

                    <div>
                        📅
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </div>

                    @if($item->status == 'pending')

                        <span class="badge badge-pending">
                            Pending
                        </span>

                    @elseif($item->status == 'disetujui')

                        <span class="badge badge-disetujui">
                            Disetujui
                        </span>

                    @else

                        <span class="badge badge-ditolak">
                            Ditolak
                        </span>

                    @endif

                </div>

            </div>

            @empty

            <div class="alert alert-success text-center m-3">

                Belum ada jadwal peminjaman

            </div>

            @endforelse

        </div>

    </div>

</div>

<!-- FEATURES -->
<div class="section reveal">

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

            <div class="col-md-4">

    <div class="feature-card">

        <div class="feature-icon">
            <i class="bi bi-calendar-check"></i>
        </div>

        <h4>
            Jadwal Real-Time
        </h4>

        <p>
            Lihat jadwal peminjaman yang sedang berlangsung maupun yang akan datang secara langsung.
        </p>

    </div>

</div>

<div class="col-md-4">

    <div class="feature-card">

        <div class="feature-icon">
            <i class="bi bi-diagram-3"></i>
        </div>

        <h4>
            Multi Fakultas
        </h4>

        <p>
            Mendukung pengelolaan gedung dan ruang kelas dari seluruh fakultas dalam satu sistem terintegrasi.
        </p>

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

<div class="section reveal">

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

<div class="section reveal bg-white">

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
                            Dwi Saputra
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
                            Mahasiswa
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
                            Dina Mariana
                        </strong>

                        <div class="text-muted small">
                            Mahasiswa
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

<div class="section reveal">

    <div class="container">

        <div class="section-title">

            <h2>
                Tim Developer
            </h2>

            <p>
                Tim pengembang sistem peminjaman kelas kampus
            </p>

        </div>

        <div class="row g-4">

            <!-- ORANG 1 -->
            <div class="col-md-4">

                <div class="feature-card text-center">

                    <img src="{{ asset('img/team/team1.jpeg') }}"
                         class="rounded-circle mb-4"
                         width="110"
                         height="110"
                         style="object-fit:cover;">

                    <h4>
                        Elvando J
                    </h4>

                    <p>
                        Fullstack Developer
                    </p>

                </div>

            </div>

            <!-- ORANG 2 -->
            <div class="col-md-4">

                <div class="feature-card text-center">

                    <img src="{{ asset('img/team/team2.jpeg') }}"
                         class="rounded-circle mb-4"
                         width="110"
                         height="110"
                         style="object-fit:cover;">

                    <h4>
                        Muhammad Tiandra
                    </h4>

                    <p>
                        Backend Developer
                    </p>

                </div>

            </div>

            <!-- ORANG 3 -->
            <div class="col-md-4">

                <div class="feature-card text-center">

                    <img src="{{ asset('img/team/team3.jpeg') }}"
                         class="rounded-circle mb-4"
                         width="110"
                         height="110"
                         style="object-fit:cover;">

                    <h4>
                        Indra Husain
                    </h4>

                    <p>
                        UI/UX Designer
                    </p>

                </div>

            </div>

            <!-- ORANG 4 -->
            <div class="col-md-4">

                <div class="feature-card text-center">

                    <img src="{{ asset('img/team/team4.jpeg') }}"
                         class="rounded-circle mb-4"
                         width="110"
                         height="110"
                         style="object-fit:cover;">

                    <h4>
                        M.Ridho
                    </h4>

                    <p>
                        Frontend Developer
                    </p>

                </div>

            </div>

            <!-- ORANG 5 -->
            <div class="col-md-4">

                <div class="feature-card text-center">

                    <img src="{{ asset('img/team/team5.jpeg') }}"
                         class="rounded-circle mb-4"
                         width="110"
                         height="110"
                         style="object-fit:cover;">

                    <h4>
                        Nabil Basmalah
                    </h4>

                    <p>
                        Project Manager
                    </p>

                </div>

            </div>

            <!-- ORANG 6 -->
            <div class="col-md-4">

                <div class="feature-card text-center">

                    <img src="{{ asset('img/team/team6.jpeg') }}"
                         class="rounded-circle mb-4"
                         width="110"
                         height="110"
                         style="object-fit:cover;">

                    <h4>
                        Muhammad Fauzan
                    </h4>

                    <p>
                        QA Engineer
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

<div class="section reveal bg-white">

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

    <a href="#"
        data-bs-toggle="modal"
        data-bs-target="#mapModal"
        class="text-decoration-none text-dark">

        <div class="feature-card text-center">

            <div class="feature-icon mx-auto">
                <i class="bi bi-geo-alt"></i>
            </div>

            <h4>
                Lokasi Kampus
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

<script>

    function revealElements(){

        let reveals = document.querySelectorAll('.reveal');

        for(let i = 0; i < reveals.length; i++){

            let windowHeight = window.innerHeight;

            let elementTop = reveals[i].getBoundingClientRect().top;

            let elementVisible = 100;

            if(elementTop < windowHeight - elementVisible){

                reveals[i].classList.add('active');

            }

        }

    }

    window.addEventListener('scroll', revealElements);

    revealElements();

</script>


<!-- =========================
    MAP MODAL
========================== -->

<div class="modal fade"
     id="mapModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content border-0 rounded-5 overflow-hidden">

            <!-- HEADER -->
            <div class="p-4 text-white"
                 style="background:linear-gradient(135deg,#4f46e5,#4338ca);">

                <h3 class="fw-bold mb-1">

                    Lokasi Kampus

                </h3>

                <small>

                    {{ $setting->campus_address }}

                </small>

            </div>

            <!-- MAP -->
            <div>

                <iframe
                    src="{{ $setting->maps_embed }}"
                    width="100%"
                    height="500"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">

                </iframe>

            </div>

            <!-- FOOTER -->
            <div class="p-4 bg-white d-flex justify-content-between align-items-center">

                <div class="text-muted">

                    Universitas Muhammadiyah Kalimantan Timur

                </div>

                <a href="{{ $setting->maps_link }}"
                   target="_blank"
                   class="btn btn-primary rounded-4 px-4">

                    Buka Google Maps

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>