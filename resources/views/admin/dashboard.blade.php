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
    min-height: 180px;
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

    /* =========================
    MOBILE RESPONSIVE
========================= */

.announcement-item{
    word-break: break-word;
}

@media (max-width:768px){

    .content-card{
        padding:18px;
    }

    .activity-item{
        flex-direction:column;
        align-items:flex-start;
        gap:10px;
    }

    .badge-modern{
        align-self:flex-start;
    }

    .activity-scroll{
        max-height:none;
    }

    .stat-number{
        font-size:30px;
    }
}

@media (max-width:576px){

    .row.g-4{
        --bs-gutter-x: 12px;
        --bs-gutter-y: 12px;
    }

    .stat-card{
        padding:16px;
        border-radius:18px;
        min-height:140px;
    }

    .stat-icon{
        width:42px;
        height:42px;
        font-size:18px;
        border-radius:12px;
    }

    .stat-title{
        font-size:12px;
        margin-top:12px;
    }

    .stat-number{
        font-size:24px;
        margin-top:6px;
    }

    .content-card{
        padding:16px;
    }

    .content-card h5{
        font-size:17px;
    }

    .content-card .d-flex{
        flex-direction:column;
        align-items:flex-start !important;
        gap:6px;
    }

    .activity-item strong{
        font-size:14px;
    }

    .activity-item .small{
        font-size:12px;
    }
}

</style>

<!-- =========================
    STATISTIK
========================== -->

<div class="row g-4">

    <!-- FAKULTAS -->
    <div class="col-6 col-md-3">

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
    <div class="col-6 col-md-3">

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
    <div class="col-6 col-md-3">

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
    <div class="col-6 col-md-3">

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
    <div class="col-12 col-lg-8">

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

    <div class="col-12 col-lg-4">

    <!-- INFORMASI SISTEM -->
    <div class="content-card">

    <h5 class="mb-4">
        Informasi Sistem
    </h5>

    <div class="mb-4">
        <strong>Total Aktivitas</strong><br>
        <small class="text-muted">
            {{ $totalAktivitas }} aktivitas
        </small>
    </div>

    <div class="mb-4">
        <strong>Status Sistem</strong><br>

        @if($statusSistem)

            <small class="text-success">
                <i class="bi bi-circle-fill"></i>
                Sistem Aktif
            </small>

        @else

            <small class="text-danger">
                <i class="bi bi-circle-fill"></i>
                Maintenance
            </small>

        @endif

    </div>

    <div>
        <strong>Jam Operasional</strong><br>
        <small class="text-primary">
            {{ $jamOperasional }}
        </small>
    </div>

</div>

    <!-- PENGUMUMAN -->
    <div class="content-card mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">
                Pengumuman Kampus
            </h5>

            <small class="text-muted">
                Terbaru
            </small>
        </div>

        @forelse($pengumuman as $item)

            <div class="announcement-item mb-3 pb-3 border-bottom">

                <strong class="d-block">
                    {{ $item->judul }}
                </strong>

                <small class="text-muted">
                    {{ Str::limit($item->isi, 100) }}
                </small>

                <div class="small text-secondary mt-2">
                    {{ $item->created_at->format('d M Y') }}
                </div>

            </div>

        @empty

            <div class="text-center py-3">

                <small class="text-muted">
                    Belum ada pengumuman.
                </small>

            </div>

        @endforelse

    </div>

</div>

</div>

@endsection
