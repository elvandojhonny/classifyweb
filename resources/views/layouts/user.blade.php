<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            overflow-x: hidden;
        }

        /* =========================
            SIDEBAR
        ========================== */

        .sidebar{
            height: 100vh;
            background: #0f172a;
            color: white;
            padding: 28px 18px;
            position: fixed;
            width: 240px;
            left: 0;
            top: 0;
        }

        .logo{
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 40px;
            color: white;
        }

        .menu-title{
            color: #64748b;
            font-size: 12px;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar a{
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            margin-bottom: 8px;
            border-radius: 14px;
            text-decoration: none;
            color: #cbd5e1;
            transition: 0.25s ease;
            font-size: 15px;
            font-weight: 500;
        }

        .sidebar a:hover{
            background: #1e293b;
            color: white;
        }

        .sidebar .active{
            background: #4f46e5;
            color: white;
            box-shadow: 0 10px 20px rgba(79,70,229,0.25);
        }

        .sidebar hr{
            border-color: rgba(255,255,255,0.08);
            margin: 24px 0;
        }

        .logout-btn{
            margin-top: 10px;
            color: #f87171 !important;
        }

        .logout-btn:hover{
            background: rgba(239,68,68,0.12) !important;
        }

        /* =========================
            CONTENT
        ========================== */

        .main-content{
            margin-left: 240px;
            padding: 28px;
            min-height: 100vh;
        }

        /* =========================
            RESPONSIVE
        ========================== */

        @media(max-width: 768px){

            .sidebar{
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content{
                margin-left: 0;
                padding: 20px;
            }

        }

    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">
        ClassiFy
    </div>

    <div class="menu-title">
        Menu
    </div>

    <a href="{{ route('user.dashboard') }}"
       class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2-fill"></i>
        Dashboard
    </a>

    <a href="{{ route('user.kelas') }}"
       class="{{ request()->routeIs('user.kelas') ? 'active' : '' }}">
        <i class="bi bi-building"></i>
        Peminjaman
    </a>

    <a href="{{ route('user.riwayat') }}"
       class="{{ request()->routeIs('user.riwayat') ? 'active' : '' }}">
        <i class="bi bi-clock-history"></i>
        Riwayat
    </a>

    <a href="{{ route('user.profile') }}"
       class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">
        <i class="bi bi-person-circle"></i>
        Profile
    </a>

    <hr>

    <form method="POST"
      action="{{ route('logout') }}">

    @csrf

    <button type="submit"
            class="border-0 bg-transparent text-start text-danger w-100">

        Logout

    </button>

</form>
</div>

<!-- CONTENT -->
<div class="main-content">

    @yield('content')

</div>

</body>
</html>