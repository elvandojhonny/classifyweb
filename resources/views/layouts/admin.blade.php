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
    width:52px;
    height:52px;
    border:none;
    border-radius:16px;
    background:#4f46e5;
    color:white;
    font-size:24px;
    display:none;
    box-shadow:0 8px 24px rgba(79,70,229,.35);
    transition:.3s ease;
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

    .page-topbar{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }

    .header-left{
        width:100%;
    }

    .header-left h3{
        font-size:30px;
    }

    .header-right{
        width:100%;
        justify-content:flex-start;
    }

    .profile-user{
        width:48px;
        height:48px;
        font-size:16px;
    }

}

/* =========================
    SMALL PHONE
========================= */

@media (max-width:768px){

    .page-topbar{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }

    .header-left{
        width:100%;
    }

    .header-left h3{
        font-size:30px;
    }

    .header-right{
        width:100%;
        justify-content:flex-start;
    }

    .profile-user{
        width:48px;
        height:48px;
        font-size:16px;
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

@media (max-width:768px){

    .page-topbar{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }

    .header-left{
        width:100%;
    }

    .header-left h3{
        font-size:30px;
    }

    .header-right{
        width:100%;
        justify-content:flex-start;
    }

    .profile-user{
        width:48px;
        height:48px;
        font-size:16px;
    }

}

@media (max-width:992px){

    .page-header-content{
        padding-left:65px;
    }

}

.page-topbar{
    background:white;
    border-radius:24px;
    padding:24px 28px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    box-shadow:0 4px 14px rgba(0,0,0,.05);
}

.header-left h3{
    margin:0;
    font-size:32px;
    font-weight:700;
    color:#0f172a;
}

.header-left p{
    margin-top:6px;
    margin-bottom:0;
    color:#64748b;
}

.header-right{
    display:flex;
    align-items:center;
    gap:14px;
}

.profile-info{
    display:flex;
    flex-direction:column;
}

.profile-info strong{
    color:#0f172a;
}

.profile-info small{
    color:#64748b;
}

/* Admin User Panel */

.page-section{
    margin-bottom:24px;
}

.page-section h2{
    font-size:28px;
    font-weight:700;
    margin-bottom:4px;
}

.page-section p{
    color:#64748b;
    margin-bottom:0;
}

@media(max-width:768px){

    .page-section h2{
        font-size:18px;
    }

    .page-section p{
        font-size:13px;
    }

    .page-section{
        margin-bottom:16px;
    }
}

</style>

</head>

<body>

    <!-- MOBILE TOGGLE -->
<button id="mobileToggle"
        class="mobile-menu-btn d-lg-none"
        type="button">
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
    <div class="page-topbar">

    <div class="header-left">

        <h3>@yield('page-title')</h3>

        <p>
            Sistem Manajemen Peminjaman Ruangan
        </p>

    </div>

    <div class="header-right">

        <div class="profile-user">
            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
        </div>

        <div class="profile-info">

            <strong>
                {{ auth()->user()->name }}
            </strong>

            <small>

                @if(auth()->user()->role == 'superadmin')
                    Super Admin
                @elseif(auth()->user()->role == 'admin')
                    Admin Fakultas
                @else
                    User
                @endif

            </small>

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
const mobileToggle = document.getElementById('mobileToggle');

function openSidebar(){

    sidebar.classList.add('show');
    overlay.classList.add('show');

    if(window.innerWidth <= 992){
        mobileToggle.style.left = '220px';
    }
}

function closeSidebar(){

    sidebar.classList.remove('show');
    overlay.classList.remove('show');

    mobileToggle.style.left = '15px';
}

function toggleSidebar(){

    if(sidebar.classList.contains('show')){
        closeSidebar();
    }else{
        openSidebar();
    }
}

mobileToggle.addEventListener('click', toggleSidebar);

overlay.addEventListener('click', closeSidebar);

document.querySelectorAll('.sidebar a').forEach(link => {

    link.addEventListener('click', () => {

        if(window.innerWidth <= 992){
            closeSidebar();
        }

    });

});

window.addEventListener('resize', () => {

    if(window.innerWidth > 992){
        closeSidebar();
    }

});

</script>

</body>
</html>