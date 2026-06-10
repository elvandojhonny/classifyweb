@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('page-title', 'Peminjaman')

@section('content')

<style>

    .section-header{
        margin-bottom: 28px;
    }

    .section-header h4{
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 4px;
    }

    .section-header p{
        color: #64748b;
        margin: 0;
    }

    .peminjaman-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        transition: 0.3s ease;
        height: 100%;
    }

    .peminjaman-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 14px 28px rgba(0,0,0,0.08);
    }

    .card-title{
        font-size: 22px;
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
        font-size: 14px;
    }

    .status-badge{
        display: inline-block;
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 10px;
    }

    .status-pending{
        background: rgba(245,158,11,0.12);
        color: #d97706;
    }

    .status-success{
        background: rgba(34,197,94,0.12);
        color: #16a34a;
    }

    .status-danger{
        background: rgba(239,68,68,0.12);
        color: #dc2626;
    }

    .action-group{
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-approve{
        flex: 1;
        border: none;
        border-radius: 12px;
        padding: 10px;
        background: rgba(34,197,94,0.12);
        color: #16a34a;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-approve:hover{
        background: rgba(34,197,94,0.2);
    }

    .btn-reject{
        flex: 1;
        border: none;
        border-radius: 12px;
        padding: 10px;
        background: rgba(239,68,68,0.12);
        color: #dc2626;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-reject:hover{
        background: rgba(239,68,68,0.2);
    }

    .empty-card{
        background: white;
        border-radius: 24px;
        padding: 60px 20px;
        text-align: center;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }

</style>

<!-- HEADER -->
<div class="section-header">

    <h4>Data Peminjaman</h4>

    <p>
        Kelola pengajuan peminjaman ruangan
    </p>

</div>

<!-- GRID -->
<div class="row g-4">

    @forelse($data as $item)

    <div class="col-md-6">

        <div class="peminjaman-card">

            <!-- TITLE -->
            <div class="card-title">
                {{ $item->kelas->nama_kelas }}
            </div>

            <!-- INFO -->
            <div class="info-item">
                <i class="bi bi-person"></i>
                {{ $item->user->name }}
            </div>

            <div class="info-item">
                <i class="bi bi-calendar-event"></i>
                {{ $item->tanggal }}
            </div>

            <div class="info-item">
                <i class="bi bi-clock"></i>
                {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
            </div>

            <div class="info-item">
                <i class="bi bi-chat-left-text"></i>
                {{ $item->keperluan }}
            </div>

            <!-- STATUS -->
            @if($item->status == 'disetujui')

                <span class="status-badge status-success">
                    Disetujui
                </span>

            @elseif($item->status == 'ditolak')

                <span class="status-badge status-danger">
                    Ditolak
                </span>

            @else

                <span class="status-badge status-pending">
                    Pending
                </span>

            @endif

            <!-- ACTION -->
            @if($item->status == 'pending')

            <div class="action-group">

                <form action="{{ route('peminjaman.approve', $item->id) }}"
                      method="POST"
                      class="flex-fill">

                    @csrf
                    @method('PUT')

                    <button class="btn-approve w-100">

                        Approve

                    </button>

                </form>

                <form action="{{ route('peminjaman.reject', $item->id) }}"
                      method="POST"
                      class="flex-fill">

                    @csrf
                    @method('PUT')

                    <button class="btn-reject w-100">

                        Reject

                    </button>

                </form>

            </div>

            @endif

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="empty-card">

            <h5 class="mb-2">
                Belum Ada Pengajuan
            </h5>

            <p class="text-muted mb-0">
                Data peminjaman akan muncul di sini
            </p>

        </div>

    </div>

    @endforelse

</div>

@endsection