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

<div class="container">

    <!-- NAVBAR -->
    <div class="navbar-custom d-flex justify-content-between align-items-center">

        <div class="brand">
            ClassiFy
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
                    Platform digital untuk mempermudah proses peminjaman
                    ruang kelas kampus secara cepat, modern,
                    dan realtime.
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
                        <h2>24</h2>
                    </div>

                    <div class="stat-box">
                        <small>Peminjaman Hari Ini</small>
                        <h2>12</h2>
                    </div>

                    <div class="stat-box">
                        <small>Status Sistem</small>
                        <h2 style="font-size:24px;color:#16a34a;">
                            Online
                        </h2>
                    </div>

                </div>

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
    © 2026 ClassiFy — Sistem Peminjaman Kelas
</footer>

</body>
</html>