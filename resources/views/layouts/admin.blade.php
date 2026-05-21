<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Inter',sans-serif;
            background:#f1f5f9;
            overflow-x:hidden;
        }

        /* =========================
            SIDEBAR
        ========================== */

        .sidebar{
            width:240px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:#0f172a;
            padding:28px 18px;
            color:white;
        }

        .logo{
            font-size:28px;
            font-weight:700;
            margin-bottom:40px;
        }

        .menu-title{
            color:#64748b;
            font-size:12px;
            margin-bottom:12px;
            text-transform:uppercase;
            letter-spacing:1px;
        }

        .sidebar a{
            display:flex;
            align-items:center;
            gap:12px;
            padding:14px 16px;
            border-radius:14px;
            margin-bottom:8px;
            text-decoration:none;
            color:#cbd5e1;
            transition:0.3s ease;
            font-size:15px;
            font-weight:500;
        }

        .sidebar a:hover{
            background:#1e293b;
            color:white;
        }

        .sidebar .active{
            background:#4f46e5;
            color:white;
            box-shadow:0 10px 24px rgba(79,70,229,0.25);
        }

        .sidebar hr{
            border-color:rgba(255,255,255,0.08);
            margin:24px 0;
        }

        .logout-btn{
            color:#f87171 !important;
        }

        .logout-btn:hover{
            background:rgba(239,68,68,0.12) !important;
        }

        /* =========================
            MAIN CONTENT
        ========================== */

        .main-content{
            margin-left:240px;
            padding:28px;
            min-height:100vh;
        }

        /* =========================
            TOPBAR
        ========================== */

        .page-topbar{
            background:white;
            border-radius:22px;
            padding:22px 26px;
            margin-bottom:28px;
            box-shadow:0 4px 14px rgba(0,0,0,0.05);
        }

        .page-topbar h3{
            margin:0;
            font-weight:700;
            color:#0f172a;
        }

        .page-topbar p{
            margin:4px 0 0;
            color:#64748b;
            font-size:14px;
        }

        .profile-user{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#4f46e5;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:700;
        }

        /* =========================
            ALERT
        ========================== */

        .alert-modern{
            border:none;
            border-radius:16px;
            padding:14px 18px;
            margin-bottom:20px;
        }

        .alert-success-modern{
            background:rgba(34,197,94,0.12);
            color:#16a34a;
        }

        .alert-danger-modern{
            background:rgba(239,68,68,0.12);
            color:#dc2626;
        }

    </style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        Admin Panel
    </div>

    <div class="menu-title">
        Main Menu
    </div>

    <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

        <i class="bi bi-grid-1x2-fill"></i>
        Dashboard

    </a>

    <a href="{{ route('fakultas.index') }}"
       class="{{ request()->routeIs('fakultas.*') ? 'active' : '' }}">

        <i class="bi bi-bank"></i>
        Fakultas

    </a>

    <a href="{{ route('gedung.index') }}"
       class="{{ request()->routeIs('gedung.*') ? 'active' : '' }}">

        <i class="bi bi-building"></i>
        Gedung

    </a>

    <a href="{{ route('kelas.index') }}"
       class="{{ request()->routeIs('kelas.*') ? 'active' : '' }}">

        <i class="bi bi-door-open"></i>
        Kelas

    </a>

    <a href="{{ route('users.index') }}"
       class="{{ request()->routeIs('users.*') ? 'active' : '' }}">

        <i class="bi bi-people"></i>
        Akun

    </a>

    <a href="{{ route('admin.peminjaman') }}"
       class="{{ request()->routeIs('admin.peminjaman') ? 'active' : '' }}">

        <i class="bi bi-journal-text"></i>
        Peminjaman

    </a>

    <a href="{{ route('pengumuman.index') }}"
       class="{{ request()->routeIs('pengumuman.*') ? 'active' : '' }}">

        <i class="bi bi-bell"></i>
        Pengumuman

    </a>

    <hr>

    <form method="POST"
      action="{{ route('logout') }}">

    @csrf

    <button type="submit"
            class="logout-btn border-0 bg-transparent w-100 text-start">

        <i class="bi bi-box-arrow-right"></i>
        Logout

    </button>

</form>

</div>

<!-- MAIN -->
<div class="main-content">

    <!-- TOPBAR -->
    <div class="page-topbar d-flex justify-content-between align-items-center">

        <div>

            <h3>@yield('page-title')</h3>

            <p>
                Sistem Manajemen Peminjaman Ruangan
            </p>

        </div>

        <div class="d-flex align-items-center gap-3">

            <div class="text-end">
                <strong>{{ auth()->user()->name }}</strong><br>
                <small class="text-muted">Administrator</small>
            </div>

            <div class="profile-user">
                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </div>

        </div>

    </div>

    <!-- ALERT -->
    @if(session('success'))

        <div class="alert-modern alert-success-modern">

            {{ session('success') }}

        </div>

    @endif

    @if($errors->any())

        <div class="alert-modern alert-danger-modern">

            {{ $errors->first() }}

        </div>

    @endif

    <!-- CONTENT -->
    @yield('content')

</div>

</body>
</html>