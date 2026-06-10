<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ClassiFy</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family:'Inter',sans-serif;
        }

        body{
            background:#f1f5f9;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;
        }

        .login-wrapper{
            width:100%;
            max-width:1100px;
            background:white;
            border-radius:36px;
            overflow:hidden;
            box-shadow:0 25px 60px rgba(0,0,0,0.08);
        }

        .left-side{
            background:linear-gradient(135deg,#4f46e5,#4338ca);
            padding:60px;
            color:white;
            height:100%;
            position:relative;
            overflow:hidden;
        }

        .left-side::before{
            content:'';
            position:absolute;
            width:350px;
            height:350px;
            background:rgba(255,255,255,0.08);
            border-radius:50%;
            top:-120px;
            right:-120px;
        }

        .left-side h1{
            font-size:48px;
            font-weight:800;
            line-height:1.2;
        }

        .left-side p{
            margin-top:20px;
            color:rgba(255,255,255,0.8);
            line-height:1.8;
        }

        .right-side{
            padding:60px;
        }

        .login-title{
            font-size:34px;
            font-weight:800;
            color:#0f172a;
        }

        .login-subtitle{
            color:#64748b;
            margin-top:10px;
            margin-bottom:40px;
        }

        .form-label{
            font-weight:600;
            margin-bottom:10px;
        }

        .form-control{
            height:58px;
            border-radius:18px;
            border:1px solid #e2e8f0;
            padding-left:18px;
        }

        .form-control:focus{
            box-shadow:none;
            border-color:#4f46e5;
        }

        .login-btn{
            width:100%;
            height:58px;
            border:none;
            border-radius:18px;
            background:#4f46e5;
            color:white;
            font-weight:700;
            transition:0.3s;
        }

        .login-btn:hover{
            background:#4338ca;
        }

        .back-home{
            display:inline-flex;
            align-items:center;
            gap:8px;
            margin-top:25px;
            color:#64748b;
            text-decoration:none;
        }

        @media(max-width:768px){

            .left-side{
                display:none;
            }

            .right-side{
                padding:40px 25px;
            }

        }

    </style>
</head>
<body>

<div class="login-wrapper">

    <div class="row g-0">

        <!-- LEFT -->
        <div class="col-lg-6">

            <div class="left-side">

                <h1>
                    ClassiFy
                </h1>

                <p>
                    Sistem peminjaman kelas modern untuk mendukung
                    aktivitas kampus digital secara cepat,
                    aman, dan realtime.
                </p>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-6">

            <div class="right-side">

                <div class="login-title">
                    Selamat Datang
                </div>

                <div class="login-subtitle">
                    Silakan login untuk melanjutkan
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="mb-4">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Masukkan email"
                               required>

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-4">

                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Masukkan password"
                               required>

                    </div>

                    <!-- REMEMBER -->
                    <div class="form-check mb-4">

                        <input class="form-check-input"
                               type="checkbox"
                               name="remember">

                        <label class="form-check-label">
                            Remember me
                        </label>

                    </div>

                    <button class="login-btn">
                        Login
                    </button>

                </form>

                <a href="/" class="back-home">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Home
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>