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
            color:#f87171 !important;
        }

        .logout-btn:hover{
            background:rgba(239,68,68,0.12) !important;
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
    MOBILE
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
        height:100vh;
        position:fixed;
        left:0;
        top:0;
        z-index:999;
        overflow-y:auto;
    }

    .sidebar.show{
        transform:translateX(0);
    }

    .main-content{
        margin-left:0 !important;
        padding:80px 18px 20px;
    }
}

    .page-topbar{
    background:white;
    border-radius:24px;
    padding:24px 28px;
    margin-bottom:28px;
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
    margin:6px 0 0;
    color:#64748b;
}

.header-right{
    display:flex;
    align-items:center;
    gap:14px;
}

.profile-user{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#4f46e5;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
    font-size:18px;
}

.profile-info strong{
    display:block;
    color:#0f172a;
}

.profile-info small{
    color:#64748b;
}

@media(max-width:768px){

    .page-topbar{
        flex-direction:column;
        align-items:flex-start;
    }

    .header-left h3{
        font-size:26px;
    }
}

    </style>

</head>

<body>

    <button id="mobileToggle"
        class="mobile-menu-btn d-lg-none"
        type="button">

    <i class="bi bi-list"></i>

</button>

<div class="sidebar-overlay"></div>

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
            class="logout-btn border-0 bg-transparent w-100 text-start">

        <i class="bi bi-box-arrow-right"></i>
        Logout

    </button>

</form>
</div> 

<!-- CONTENT -->
<div class="main-content">

    <div class="page-topbar">

        <div class="header-left">

            <h3>
                @yield('page-title', 'Dashboard')
            </h3>

            <p>
                Sistem Peminjaman Ruangan Kampus
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
                    User
                </small>

            </div>

        </div>

    </div>

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