@extends('layouts.user')

@section('title', 'Data Akun')

@section('page-title', 'Profil')

@section('content')

<style>

.section-header{
    margin-bottom:24px;
}

.section-header h4{
    font-weight:700;
    color:#0f172a;
    margin-bottom:4px;
}

.section-header p{
    color:#64748b;
    margin:0;
}

/* CARD */

.profile-card{
    background:white;
    border-radius:24px;
    padding:24px;
    border:1px solid rgba(0,0,0,.04);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
}

.profile-header{
    display:flex;
    align-items:center;
    gap:18px;
    margin-bottom:24px;
    padding-bottom:24px;
    border-bottom:1px solid #e2e8f0;
}

.profile-avatar{
    width:90px;
    height:90px;
    border-radius:50%;
    background:linear-gradient(135deg,#4f46e5,#6366f1);
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    font-weight:700;
    flex-shrink:0;
    box-shadow:0 10px 24px rgba(79,70,229,.25);
}

.profile-name{
    font-size:24px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:4px;
}

.profile-role{
    color:#64748b;
    margin:0;
}

/* INFO BOX */

.info-card{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:18px;
    padding:18px;
    height:100%;
    transition:.3s;
}

.info-card:hover{
    transform:translateY(-3px);
    box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.info-card small{
    display:block;
    color:#64748b;
    margin-bottom:6px;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:.5px;
}

.info-card strong{
    color:#0f172a;
    font-size:15px;
    word-break:break-word;
}

.role-badge{
    color:#4f46e5 !important;
}

.status-active{
    color:#16a34a !important;
}

/* MOBILE */

@media(max-width:768px){

    .profile-card{
        padding:16px;
        border-radius:18px;
    }

    .profile-header{
        flex-direction:column;
        text-align:center;
        gap:14px;
        padding-bottom:18px;
    }

    .profile-avatar{
        width:70px;
        height:70px;
        font-size:24px;
    }

    .profile-name{
        font-size:18px;
    }

    .info-card{
        padding:14px;
        border-radius:14px;
    }

    .info-card strong{
        font-size:13px;
    }

    .section-header h4{
        font-size:20px;
    }

    .section-header p{
        font-size:13px;
    }
}

</style>

<!-- HEADER -->

<div class="section-header">

    <h4>Profile</h4>

    <p>
        Informasi akun pengguna sistem
    </p>

</div>

<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="profile-card">

            <!-- PROFILE HEADER -->

            <div class="profile-header">

                <div class="profile-avatar">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>

                <div>

                    <div class="profile-name">
                        {{ auth()->user()->name }}
                    </div>

                    <p class="profile-role">
                        Pengguna Sistem Peminjaman Ruangan
                    </p>

                </div>

            </div>

            <!-- INFO -->

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="info-card">

                        <small>NIM</small>

                        <strong>
                            {{ auth()->user()->nim ?? '-' }}
                        </strong>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="info-card">

                        <small>Program Studi</small>

                        <strong>
                            {{ auth()->user()->prodi ?? '-' }}
                        </strong>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="info-card">

                        <small>Email</small>

                        <strong>
                            {{ auth()->user()->email }}
                        </strong>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="info-card">

                        <small>Role</small>

                        <strong class="role-badge">
                            {{ strtoupper(auth()->user()->role) }}
                        </strong>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="info-card">

                        <small>Status Akun</small>

                        <strong class="status-active">
                            Aktif
                        </strong>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="info-card">

                        <small>Bergabung Sejak</small>

                        <strong>
                            {{ auth()->user()->created_at->format('d M Y') }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection