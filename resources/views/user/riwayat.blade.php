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

    .riwayat-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.04);
        margin-bottom: 20px;
        transition: 0.3s ease;
    }

    .riwayat-card:hover{
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.08);
    }

    .kelas-title{
        font-size: 24px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 12px;
    }

    .info-item{
        display: flex;
        align-items: center;
        gap: 10px;
        color: #475569;
        margin-bottom: 10px;
    }

    .status-badge{
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 13px;
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

    .empty-card{
        background: white;
        border-radius: 24px;
        padding: 60px 20px;
        text-align: center;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }

</style>

<!-- TOPBAR -->
<div class="page-topbar d-flex justify-content-between align-items-center">

    <div>

        <h3>Riwayat Peminjaman</h3>

        <p>
            Daftar seluruh pengajuan peminjaman ruangan
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

<!-- CONTENT -->

@forelse($riwayat as $item)

<div class="riwayat-card">

    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

        <div>

            <!-- TITLE -->
            <div class="kelas-title">
                {{ $item->kelas->nama_kelas }}
            </div>

            <!-- INFO -->
            <div class="info-item">
                <i class="bi bi-building"></i>
                {{ $item->kelas->gedung->nama_gedung }}
            </div>

            <div class="info-item">
                <i class="bi bi-mortarboard"></i>
                {{ $item->kelas->gedung->fakultas->nama_fakultas }}
            </div>

            <div class="info-item">
                <i class="bi bi-calendar-event"></i>
                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
            </div>

            <div class="info-item">
                <i class="bi bi-clock"></i>
                {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
            </div>

            <div class="info-item">
                <i class="bi bi-chat-left-text"></i>
                {{ $item->keperluan }}
            </div>

        </div>

        <!-- STATUS -->
        <div>

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

    </div>

</div>

@empty

<div class="empty-card">

    <h5 class="mb-2">
        Belum Ada Riwayat
    </h5>

    <p class="text-muted mb-0">
        Pengajuan peminjaman akan tampil di sini
    </p>

</div>

@endforelse

@endsection