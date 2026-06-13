@extends('layouts.user')

@section('page-title', 'Dashboard User')

@section('content')

<style>

    /* =========================
    STAT CARD
========================= */

.stat-card{
    background:white;
    border-radius:24px;
    padding:24px;
    border:1px solid rgba(0,0,0,.04);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
    transition:.3s ease;
    min-height:180px;
}

.stat-card:hover{
    transform:translateY(-5px);
    box-shadow:0 16px 30px rgba(0,0,0,.08);
}

.stat-icon{
    width:60px;
    height:60px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
}

.stat-title{
    color:#64748b;
    font-size:14px;
    margin-top:18px;
}

.stat-number{
    font-size:38px;
    font-weight:700;
    color:#0f172a;
    margin-top:4px;
}

/* CARD CONTENT */

.content-card{
    background:white;
    border-radius:24px;
    padding:24px;
    margin-top:28px;
    border:1px solid rgba(0,0,0,.04);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
}

.content-card h5{
    font-weight:700;
    color:#0f172a;
}

/* ACTIVITY */

.activity-scroll{
    max-height:360px;
    overflow-y:auto;
    padding-right:6px;
}

.activity-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 0;
    border-bottom:1px solid #e2e8f0;
}

.activity-item:last-child{
    border-bottom:none;
}

/* BADGE */

.badge-modern{
    padding:7px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
}

.badge-success{
    background:rgba(34,197,94,.12);
    color:#16a34a;
}

.badge-danger{
    background:rgba(239,68,68,.12);
    color:#dc2626;
}

.badge-warning{
    background:rgba(245,158,11,.12);
    color:#d97706;
}

.bg-primary-soft{
    background:rgba(79,70,229,.12);
    color:#4f46e5;
}

.bg-success-soft{
    background:rgba(34,197,94,.12);
    color:#16a34a;
}

.bg-danger-soft{
    background:rgba(239,68,68,.12);
    color:#dc2626;
}

.bg-warning-soft{
    background:rgba(245,158,11,.12);
    color:#d97706;
}

/* MOBILE */

@media(max-width:768px){

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

@media(max-width:576px){

    .row.g-4{
        --bs-gutter-x:12px;
        --bs-gutter-y:12px;
    }

    .stat-card{
        padding:16px;
        min-height:140px;
        border-radius:18px;
    }

    .stat-icon{
        width:42px;
        height:42px;
        font-size:18px;
        border-radius:12px;
    }

    .stat-title{
        font-size:12px;
    }

    .stat-number{
        font-size:24px;
    }

    .content-card{
        padding:16px;
    }
}

</style>

<div class="container-fluid">


    <!-- STATISTIK -->
    <div class="row g-4">

        <!-- TOTAL -->
        <div class="col-6 col-md-3">

    <div class="stat-card">

        <div class="stat-icon bg-primary-soft">
            <i class="bi bi-folder2-open"></i>
        </div>

        <div class="stat-title">
            Total Pengajuan
        </div>

        <div class="stat-number">
            {{ $totalPengajuan }}
        </div>

    </div>

</div>

        <!-- DISETUJUI -->
        <div class="col-6 col-md-3">

    <div class="stat-card">

        <div class="stat-icon bg-success-soft">
            <i class="bi bi-check-circle"></i>
        </div>

        <div class="stat-title">
            Disetujui
        </div>

        <div class="stat-number">
            {{ $disetujui }}
        </div>

    </div>

</div>

        <!-- DITOLAK -->
        <div class="col-6 col-md-3">

    <div class="stat-card">

        <div class="stat-icon bg-danger-soft">
            <i class="bi bi-x-circle"></i>
        </div>

        <div class="stat-title">
            Ditolak
        </div>

        <div class="stat-number">
            {{ $ditolak }}
        </div>

    </div>

</div>

        <!-- MENUNGGU -->
        <div class="col-6 col-md-3">

    <div class="stat-card">

        <div class="stat-icon bg-warning-soft">
            <i class="bi bi-hourglass-split"></i>
        </div>

        <div class="stat-title">
            Menunggu
        </div>

        <div class="stat-number">
            {{ $menunggu }}
        </div>

    </div>

</div>
    </div>

   <!-- CONTENT -->
<div class="row mt-4">

    <!-- LEFT SIDE -->
    <div class="col-lg-8">

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

                    <div class="text-center py-4 text-muted">

                        Belum ada aktivitas peminjaman

                    </div>

                @endforelse

            </div>

        </div>

        <!-- PENGUMUMAN -->
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
    <div class="col-lg-4">

        <div class="content-card">

            <h5 class="mb-4">
                Informasi Sistem
            </h5>

            <div class="mb-4">

                <strong>Total Aktivitas</strong><br>

                <small class="text-muted">
                    {{ $totalAktivitas ?? 0 }} aktivitas
                </small>

            </div>

            <div class="mb-4">

                <strong>Status Sistem</strong><br>

                @if($statusSistem ?? true)

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
                    {{ $jamOperasional ?? '07:30 - 21:00' }}
                </small>

            </div>

        </div>

    </div>

</div>

@endsection