@extends('layouts.user')

@section('content')

<style>

    body{
        background: #f1f5f9;
    }

    /* =========================
        TOPBAR DASHBOARD
    ========================== */

    .topbar-dashboard{
        background: white;
        border-radius: 20px;
        padding: 20px 25px;
        margin-bottom: 28px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }

    .welcome-text h4{
        margin: 0;
        font-weight: 700;
        color: #0f172a;
    }

    .welcome-text small{
        color: #64748b;
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
        font-weight: bold;
    }

    /* =========================
        CARD STATISTIK
    ========================== */

    .dashboard-card{
        background: white;
        border-radius: 22px;
        padding: 24px;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        transition: 0.3s ease;
        height: 100%;
    }

    .dashboard-card:hover{
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.08);
    }

    .card-icon{
        width: 55px;
        height: 55px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .dashboard-card small{
        color: #64748b;
        font-size: 14px;
    }

    .dashboard-card h2{
        margin-top: 8px;
        margin-bottom: 0;
        font-size: 34px;
        font-weight: 700;
        color: #0f172a;
    }

    .bg-primary-soft{
        background: rgba(79,70,229,0.12);
        color: #4f46e5;
    }

    .bg-success-soft{
        background: rgba(34,197,94,0.12);
        color: #22c55e;
    }

    .bg-danger-soft{
        background: rgba(239,68,68,0.12);
        color: #ef4444;
    }

    .bg-warning-soft{
        background: rgba(245,158,11,0.12);
        color: #f59e0b;
    }

    /* =========================
        CONTENT CARD
    ========================== */

    .content-card{
        background: white;
        border-radius: 22px;
        padding: 24px;
        margin-top: 28px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }

    .content-card h5{
        font-weight: 700;
        margin-bottom: 20px;
        color: #0f172a;
    }

    /* =========================
        ACTIVITY
    ========================== */

    .activity-scroll{
        max-height: 280px;
        overflow-y: auto;
        padding-right: 6px;
    }

    .activity-scroll::-webkit-scrollbar{
        width: 6px;
    }

    .activity-scroll::-webkit-scrollbar-thumb{
        background: #cbd5e1;
        border-radius: 20px;
    }

    .activity-scroll::-webkit-scrollbar-track{
        background: transparent;
    }

    .activity-item{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .activity-item:last-child{
        border-bottom: none;
    }

    .status-badge{
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-success{
        background: rgba(34,197,94,0.12);
        color: #16a34a;
    }

    .status-danger{
        background: rgba(239,68,68,0.12);
        color: #dc2626;
    }

    .status-warning{
        background: rgba(245,158,11,0.12);
        color: #d97706;
    }

    /* =========================
        PENGUMUMAN
    ========================== */

    .announcement-item{
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 14px;
        margin-top: 14px;
    }

    .announcement-item strong{
        color: #0f172a;
        font-size: 14px;
    }

    .announcement-item small{
        color: #64748b;
        line-height: 1.6;
    }

</style>

<div class="container-fluid">

    <!-- TOPBAR -->
    <div class="topbar-dashboard d-flex justify-content-between align-items-center">

        <div class="welcome-text">

            <h4>Dashboard</h4>

            <small>
                Selamat datang kembali di sistem peminjaman ruangan
            </small>

        </div>

        <div class="d-flex align-items-center gap-3">

            <div class="text-end">

                <strong>
                    {{ auth()->user()->name }}
                </strong><br>

                <small>User</small>

            </div>

            <div class="profile-user">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

        </div>

    </div>

    <!-- STATISTIK -->
    <div class="row g-4">

        <!-- TOTAL -->
        <div class="col-md-3">

            <div class="dashboard-card">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <small>Total Pengajuan</small>

                        <h2>{{ $totalPengajuan }}</h2>

                    </div>

                    <div class="card-icon bg-primary-soft">

                        <i class="bi bi-folder2-open"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- DISETUJUI -->
        <div class="col-md-3">

            <div class="dashboard-card">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <small>Disetujui</small>

                        <h2>{{ $disetujui }}</h2>

                    </div>

                    <div class="card-icon bg-success-soft">

                        <i class="bi bi-check-circle"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- DITOLAK -->
        <div class="col-md-3">

            <div class="dashboard-card">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <small>Ditolak</small>

                        <h2>{{ $ditolak }}</h2>

                    </div>

                    <div class="card-icon bg-danger-soft">

                        <i class="bi bi-x-circle"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- MENUNGGU -->
        <div class="col-md-3">

            <div class="dashboard-card">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <small>Menunggu</small>

                        <h2>{{ $menunggu }}</h2>

                    </div>

                    <div class="card-icon bg-warning-soft">

                        <i class="bi bi-hourglass-split"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-md-8">

            <!-- AKTIVITAS -->
            <div class="content-card">

                <h5>Aktivitas Peminjaman</h5>

                <div class="activity-scroll">

                    @forelse($aktivitas as $item)

                        <div class="activity-item">

                            <div>

                                <strong>
                                    {{ $item->kelas->nama_kelas }}
                                </strong><br>

                                <small class="text-muted">

                                    {{ $item->tanggal }}
                                    •
                                    {{ $item->jam_mulai }}
                                    -
                                    {{ $item->jam_selesai }}

                                </small>

                            </div>

                            @if($item->status == 'disetujui')

                                <span class="status-badge status-success">
                                    Disetujui
                                </span>

                            @elseif($item->status == 'ditolak')

                                <span class="status-badge status-danger">
                                    Ditolak
                                </span>

                            @else

                                <span class="status-badge status-warning">
                                    Pending
                                </span>

                            @endif

                        </div>

                    @empty

                        <div class="text-center py-4 text-muted">

                            Belum ada aktivitas peminjaman

                        </div>

                    @endforelse

                </div>

            </div>

            <!-- PENGUMUMAN -->
            <div class="content-card">

                <h5>Pengumuman</h5>

                @forelse($pengumuman as $item)

                    <div class="announcement-item">

                        <strong>
                            {{ $item->judul }}
                        </strong><br>

                        <small>

                            {{ $item->isi }}

                        </small>

                    </div>

                @empty

                    <div class="text-muted">

                        Tidak ada pengumuman terbaru

                    </div>

                @endforelse

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-4">

            <!-- INFORMASI -->
            <div class="content-card">

                <h5>Informasi Sistem</h5>

                <!-- OPERASIONAL -->
                <div class="mb-4">

                    <strong>
                        Jam Operasional
                    </strong><br>

                    <small class="text-muted">

                        Senin - Sabtu<br>
                        07:00 WIB - 19:00 WIB

                    </small>

                </div>

                <!-- STATUS -->
                <div class="mb-4">

                    <strong>
                        Status Sistem
                    </strong><br>

                    <small class="text-success">

                        Sistem Berjalan Normal

                    </small>

                </div>

                <!-- USER -->
                <div class="mb-4">

                    <strong>
                        Program Studi
                    </strong><br>

                    <small class="text-muted">

                        {{ auth()->user()->prodi }}

                    </small>

                </div>

                <!-- TOTAL -->
                <div>

                    <strong>
                        Total Pengajuan Anda
                    </strong><br>

                    <small class="text-primary">

                        {{ $totalPengajuan }} Pengajuan

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection