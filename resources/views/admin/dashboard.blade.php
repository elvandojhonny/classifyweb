@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard Admin')

@section('content')

<style>

    /* =========================
        STAT CARD
    ========================== */

    .stat-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        transition: 0.3s ease;
        height: 100%;
    }

    .stat-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 16px 30px rgba(0,0,0,0.08);
    }

    .stat-icon{
        width: 60px;
        height: 60px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .stat-title{
        color: #64748b;
        font-size: 14px;
        margin-top: 18px;
    }

    .stat-number{
        font-size: 38px;
        font-weight: 700;
        color: #0f172a;
        margin-top: 4px;
    }

    .bg-primary-soft{
        background: rgba(79,70,229,0.12);
        color: #4f46e5;
    }

    .bg-success-soft{
        background: rgba(34,197,94,0.12);
        color: #16a34a;
    }

    .bg-warning-soft{
        background: rgba(245,158,11,0.12);
        color: #d97706;
    }

    .bg-danger-soft{
        background: rgba(239,68,68,0.12);
        color: #dc2626;
    }

    /* =========================
        CONTENT CARD
    ========================== */

    .content-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        margin-top: 28px;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }

    .content-card h5{
        font-weight: 700;
        color: #0f172a;
    }

    /* =========================
        SCROLL AKTIVITAS
    ========================== */

    .activity-scroll{
        max-height: 360px;
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

    /* =========================
        ACTIVITY ITEM
    ========================== */

    .activity-item{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .activity-item:last-child{
        border-bottom: none;
    }

    /* =========================
        BADGE
    ========================== */

    .badge-modern{
        padding: 7px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-success{
        background: rgba(34,197,94,0.12);
        color: #16a34a;
    }

    .badge-danger{
        background: rgba(239,68,68,0.12);
        color: #dc2626;
    }

    .badge-warning{
        background: rgba(245,158,11,0.12);
        color: #d97706;
    }

</style>

<!-- =========================
    STATISTIK
========================== -->

<div class="row g-4">

    <!-- FAKULTAS -->
    <div class="col-md-3">

        <div class="stat-card">

            <div class="stat-icon bg-primary-soft">
                <i class="bi bi-bank"></i>
            </div>

            <div class="stat-title">
                Total Fakultas
            </div>

            <div class="stat-number">
                {{ $totalFakultas }}
            </div>

        </div>

    </div>

    <!-- GEDUNG -->
    <div class="col-md-3">

        <div class="stat-card">

            <div class="stat-icon bg-success-soft">
                <i class="bi bi-building"></i>
            </div>

            <div class="stat-title">
                Total Gedung
            </div>

            <div class="stat-number">
                {{ $totalGedung }}
            </div>

        </div>

    </div>

    <!-- KELAS -->
    <div class="col-md-3">

        <div class="stat-card">

            <div class="stat-icon bg-warning-soft">
                <i class="bi bi-door-open"></i>
            </div>

            <div class="stat-title">
                Total Kelas
            </div>

            <div class="stat-number">
                {{ $totalKelas }}
            </div>

        </div>

    </div>

    <!-- USER -->
    <div class="col-md-3">

        <div class="stat-card">

            <div class="stat-icon bg-danger-soft">
                <i class="bi bi-people"></i>
            </div>

            <div class="stat-title">
                Total Akun
            </div>

            <div class="stat-number">
                {{ $totalUser }}
            </div>

        </div>

    </div>

</div>

<!-- =========================
    CONTENT
========================== -->

<div class="row">

    <!-- AKTIVITAS -->
    <div class="col-md-8">

        <div class="content-card">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="mb-0">
                    Aktivitas Peminjaman
                </h5>

                <small class="text-muted">
                    Aktivitas terbaru sistem
                </small>

            </div>

            <!-- SCROLL -->
            <div class="activity-scroll">

                @forelse($aktivitas as $item)

                <div class="activity-item">

                    <div>

                        <strong>
                            {{ $item->kelas->nama_kelas }}
                        </strong>

                        <div class="text-muted small mt-1">

                            Dipinjam oleh
                            {{ $item->user->name }}

                        </div>

                        <div class="text-secondary small">

                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            •
                            {{ $item->jam_mulai }}
                            -
                            {{ $item->jam_selesai }}

                        </div>

                    </div>

                    @if($item->status == 'disetujui')

                        <span class="badge-modern badge-success">
                            Disetujui
                        </span>

                    @elseif($item->status == 'ditolak')

                        <span class="badge-modern badge-danger">
                            Ditolak
                        </span>

                    @else

                        <span class="badge-modern badge-warning">
                            Pending
                        </span>

                    @endif

                </div>

                @empty

                <div class="text-muted text-center py-4">

                    Belum ada aktivitas peminjaman

                </div>

                @endforelse

            </div>

        </div>

    </div>

    <!-- INFO -->
    <div class="col-md-4">

        <div class="content-card">

            <h5 class="mb-4">
                Informasi Sistem
            </h5>

            <div class="mb-4">

                <strong>Status Server</strong><br>

                <small class="text-success">
                    Server Online
                </small>

            </div>

            <div class="mb-4">

                <strong>Total Aktivitas</strong><br>

                <small class="text-muted">
                    {{ $aktivitas->count() }} aktivitas terbaru
                </small>

            </div>

            <div>

                <strong>Role Login</strong><br>

                <small class="text-primary">
                    Administrator
                </small>

            </div>

        </div>

    </div>

</div>

@endsection