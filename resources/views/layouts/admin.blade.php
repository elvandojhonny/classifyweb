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

html,
body{
    width:100%;
    overflow-x:hidden;
}

body{
    font-family:'Inter',sans-serif;
    background:#f1f5f9;
}

/* =========================
    MOBILE BUTTON
========================= */

.mobile-menu-btn{
    position:fixed;
    top:15px;
    left:15px;
    z-index:1200;
    width:46px;
    height:46px;
    border:none;
    border-radius:12px;
    background:#4f46e5;
    color:white;
    font-size:22px;
    display:none;
    box-shadow:0 5px 18px rgba(0,0,0,.15);
}

/* =========================
    OVERLAY
========================= */

.sidebar-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.45);
    z-index:998;
    opacity:0;
    visibility:hidden;
    transition:.3s;
}

.sidebar-overlay.show{
    opacity:1;
    visibility:visible;
}

/* =========================
    SIDEBAR
========================= */

.sidebar{
    width:240px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:#0f172a;
    padding:28px 18px;
    color:white;
    overflow-y:auto;
    z-index:999;
}

.sidebar::-webkit-scrollbar{
    width:5px;
}

.sidebar::-webkit-scrollbar-thumb{
    background:#334155;
    border-radius:20px;
}

.logo{
    font-size:28px;
    font-weight:700;
    margin-bottom:40px;
}

.menu-title{
    color:#64748b;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:1px;
    margin-bottom:12px;
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
    transition:.25s;
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
    box-shadow:0 10px 24px rgba(79,70,229,.25);
}

.sidebar hr{
    border-color:rgba(255,255,255,.08);
    margin:24px 0;
}

.logout-btn{
    color:#f87171 !important;
}

.logout-btn:hover{
    background:rgba(239,68,68,.12) !important;
}

/* =========================
    MAIN CONTENT
========================= */

.main-content{
    margin-left:240px;
    padding:28px;
    min-height:100vh;
}

/* =========================
    TOPBAR
========================= */

.page-topbar{
    background:white;
    border-radius:22px;
    padding:22px 26px;
    margin-bottom:28px;
    box-shadow:0 4px 14px rgba(0,0,0,.05);
}

.page-topbar h3{
    margin:0;
    font-weight:700;
    color:#0f172a;
}

.page-topbar p{
    margin-top:4px;
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
========================= */

.alert-modern{
    border:none;
    border-radius:16px;
    padding:14px 18px;
    margin-bottom:20px;
}

.alert-success-modern{
    background:rgba(34,197,94,.12);
    color:#16a34a;
}

.alert-danger-modern{
    background:rgba(239,68,68,.12);
    color:#dc2626;
}

/* =========================
    GLOBAL RESPONSIVE
========================= */

.card{
    border:none;
    border-radius:18px;
    overflow:hidden;
}

.card-body{
    padding:20px;
}

.btn{
    min-height:44px;
}

.form-control,
.form-select{
    min-height:48px;
}

textarea.form-control{
    min-height:120px;
}

.table-responsive{
    overflow-x:auto;
    -webkit-overflow-scrolling:touch;
}

.table{
    margin-bottom:0;
    white-space:nowrap;
}

img{
    max-width:100%;
    height:auto;
}

.row{
    margin-left:0;
    margin-right:0;
}

/* =========================
    TABLET
========================= */

@media (max-width:992px){

    .mobile-menu-btn{
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .sidebar{
        transform:translateX(-100%);
        transition:.3s ease;
        width:280px;
    }

    .sidebar.show{
        transform:translateX(0);
    }

    .main-content{
        margin-left:0;
        padding:80px 18px 20px;
    }

    .page-topbar{
        padding:18px;
    }

    .page-topbar h3{
        font-size:22px;
    }
}

/* =========================
    MOBILE
========================= */

@media (max-width:768px){

    .main-content{
        padding:80px 15px 20px;
    }

    .page-topbar{
        display:flex !important;
        flex-direction:column;
        align-items:flex-start !important;
        gap:16px;
    }

    .page-topbar .d-flex{
        width:100%;
    }

    .page-topbar .gap-3{
        width:100%;
        justify-content:space-between;
    }

    .profile-user{
        width:42px;
        height:42px;
        font-size:14px;
    }

    .card-body{
        padding:16px;
    }

    .btn{
        width:auto;
    }

    table{
        min-width:700px;
    }

    .d-flex.gap-2{
        flex-wrap:wrap;
    }
}

/* =========================
    SMALL PHONE
========================= */

@media (max-width:576px){

    .sidebar{
        width:260px;
    }

    .logo{
        font-size:24px;
    }

    .page-topbar{
        padding:16px;
    }

    .page-topbar h3{
        font-size:20px;
    }

    .page-topbar p{
        font-size:13px;
    }

    .main-content{
        padding:75px 12px 15px;
    }

    .profile-user{
        width:38px;
        height:38px;
        font-size:13px;
    }

    .card-body{
        padding:14px;
    }

    .table{
        font-size:14px;
    }
}

/* RESPONSIVE GLOBAL */

.table-responsive{
    overflow-x:auto;
    -webkit-overflow-scrolling:touch;
}

img{
    max-width:100%;
    height:auto;
}

@media(max-width:768px){

    .main-content{
        padding:80px 15px 20px;
    }

    .page-topbar{
        flex-direction:column;
        align-items:flex-start !important;
        gap:15px;
    }

    .page-topbar .d-flex{
        width:100%;
        justify-content:space-between;
    }

    .btn{
        min-height:44px;
    }

    .form-control,
    .form-select{
        min-height:44px;
    }
}

</style>

</head>

<body>

    <!-- MOBILE TOGGLE -->
<button class="mobile-menu-btn d-lg-none"
        type="button"
        onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
</button>

<div class="sidebar-overlay"
     onclick="toggleSidebar()"></div>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">

    @if(auth()->user()->role == 'superadmin')

        Super Admin

    @elseif(auth()->user()->role == 'admin')

        Admin Fakultas

    @else

        User Panel

    @endif

</div>

    <div class="menu-title">
    Main Menu
</div>

<!-- DASHBOARD -->
<a href="{{ route('admin.dashboard') }}"
   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

    <i class="bi bi-grid-1x2-fill"></i>
    Dashboard

</a>

<!-- SUPER ADMIN ONLY -->
@if(auth()->user()->role == 'superadmin')

<a href="{{ route('fakultas.index') }}"
   class="{{ request()->routeIs('fakultas.*') ? 'active' : '' }}">

    <i class="bi bi-bank"></i>
    Fakultas

</a>

@endif

<!-- GEDUNG -->
<a href="{{ route('gedung.index') }}"
   class="{{ request()->routeIs('gedung.*') ? 'active' : '' }}">

    <i class="bi bi-building"></i>
    Gedung

</a>

<!-- KELAS -->
<a href="{{ route('kelas.index') }}"
   class="{{ request()->routeIs('kelas.*') ? 'active' : '' }}">

    <i class="bi bi-door-open"></i>
    Kelas

</a>

<!-- USER -->
<a href="{{ route('users.index') }}"
   class="{{ request()->routeIs('users.*') ? 'active' : '' }}">

    <i class="bi bi-people"></i>

    @if(auth()->user()->role == 'superadmin')
        Manajemen Akun
    @else
        User Fakultas
    @endif

</a>

<!-- PEMINJAMAN -->
<a href="{{ route('admin.peminjaman') }}"
   class="{{ request()->routeIs('admin.peminjaman') ? 'active' : '' }}">

    <i class="bi bi-journal-text"></i>
    Peminjaman

</a>

<!-- PENGUMUMAN -->
<a href="{{ route('pengumuman.index') }}"
   class="{{ request()->routeIs('pengumuman.*') ? 'active' : '' }}">

    <i class="bi bi-bell"></i>
    Pengumuman

</a>

<!-- SETTINGS HANYA SUPER ADMIN -->
@if(auth()->user()->role == 'superadmin')

<a href="{{ route('settings.index') }}"
   class="{{ request()->routeIs('settings.*') ? 'active' : '' }}">

    <i class="bi bi-gear"></i>
    Pengaturan Sistem

</a>

@endif

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
                @if(auth()->user()->role == 'superadmin')

    <small class="text-muted">
        Super Admin
    </small>

@elseif(auth()->user()->role == 'admin')

    <small class="text-muted">
        Admin Fakultas
    </small>

@else

    <small class="text-muted">
        User
    </small>

@endif
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

<script>

const sidebar = document.querySelector('.sidebar');
const overlay = document.querySelector('.sidebar-overlay');

function toggleSidebar() {
    sidebar.classList.toggle('show');
    overlay.classList.toggle('show');
}

function closeSidebar() {
    sidebar.classList.remove('show');
    overlay.classList.remove('show');
}

window.addEventListener('resize', () => {

    if(window.innerWidth > 992){
        closeSidebar();
    }
});

overlay.addEventListener('click', closeSidebar);

document.querySelectorAll('.sidebar a').forEach(link => {

    link.addEventListener('click', () => {

        if(window.innerWidth <= 992){
            closeSidebar();
        }
    });
});

</script>

</body>
</html>
