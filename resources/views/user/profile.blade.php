@extends('layouts.user')

@section('content')

<style>

    .page-topbar{
        background: white;
        border-radius: 22px;
        padding: 22px 26px;
        margin-bottom: 28px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }

    .page-topbar h3{
        margin: 0;
        font-weight: 700;
        color: #0f172a;
    }

    .page-topbar p{
        margin: 4px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .profile-user{
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #4f46e5;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .profile-card{
        background: white;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.04);
    }

    .profile-header{
        display: flex;
        align-items: center;
        gap: 22px;
        margin-bottom: 28px;
    }

    .profile-avatar{
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: linear-gradient(135deg,#4f46e5,#6366f1);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: 700;
        box-shadow: 0 10px 24px rgba(79,70,229,0.25);
    }

    .profile-header h4{
        margin: 0;
        font-weight: 700;
        color: #0f172a;
    }

    .profile-header p{
        margin: 4px 0 0;
        color: #64748b;
    }

    .profile-info{
        background: #f8fafc;
        border-radius: 18px;
        padding: 18px 20px;
        height: 100%;
        border: 1px solid #e2e8f0;
        transition: 0.3s ease;
    }

    .profile-info:hover{
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    .profile-info small{
        color: #64748b;
        font-size: 13px;
    }

    .profile-info h6{
        margin-top: 8px;
        margin-bottom: 0;
        font-weight: 700;
        color: #0f172a;
        word-break: break-word;
    }

    .status-active{
        color: #16a34a !important;
    }

</style>

<!-- TOPBAR -->
<div class="page-topbar d-flex justify-content-between align-items-center">

    <div>

        <h3>Profile User</h3>

        <p>
            Informasi akun pengguna sistem
        </p>

    </div>

    <div class="d-flex align-items-center gap-3">

        <div class="text-end">
            <strong>{{ auth()->user()->name }}</strong><br>
            <small class="text-muted">User</small>
        </div>

        <div class="profile-user">
            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
        </div>

    </div>

</div>

<!-- PROFILE -->
<div class="row justify-content-center">

    <div class="col-md-10">

        <div class="profile-card">

            <!-- HEADER -->
            <div class="profile-header">

                <div class="profile-avatar">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>

                <div>

                    <h4>
                        {{ auth()->user()->name }}
                    </h4>

                    <p>
                        Mahasiswa Aktif
                    </p>

                </div>

            </div>

            <!-- GRID -->
            <div class="row g-4">

                <!-- NIM -->
                <div class="col-md-6">

                    <div class="profile-info">

                        <small>NIM</small>

                        <h6>
                            {{ auth()->user()->nim ?? '-' }}
                        </h6>

                    </div>

                </div>

                <!-- PRODI -->
                <div class="col-md-6">

                    <div class="profile-info">

                        <small>Program Studi</small>

                        <h6>
                            {{ auth()->user()->prodi ?? '-' }}
                        </h6>

                    </div>

                </div>

                <!-- EMAIL -->
                <div class="col-md-6">

                    <div class="profile-info">

                        <small>Email</small>

                        <h6>
                            {{ auth()->user()->email }}
                        </h6>

                    </div>

                </div>

                <!-- ROLE -->
                <div class="col-md-6">

                    <div class="profile-info">

                        <small>Role</small>

                        <h6 class="text-primary">
                            {{ strtoupper(auth()->user()->role) }}
                        </h6>

                    </div>

                </div>

                <!-- STATUS -->
                <div class="col-md-6">

                    <div class="profile-info">

                        <small>Status Akun</small>

                        <h6 class="status-active">
                            Aktif
                        </h6>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection