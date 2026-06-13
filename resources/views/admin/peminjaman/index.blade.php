@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('page-title', 'Peminjaman')

@section('content')

<style>

.section-header{
    margin-bottom:24px;
}

.section-header h4{
    font-size:22px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:4px;
}

.section-header p{
    color:#64748b;
    font-size:14px;
    margin:0;
}

.peminjaman-card{
    background:white;
    border-radius:20px;
    padding:18px;
    border:1px solid #e2e8f0;
    box-shadow:0 4px 12px rgba(0,0,0,.04);
    transition:.25s;
    height:100%;
}

.peminjaman-card:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(0,0,0,.08);
}

.card-title{
    font-size:17px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:14px;
    line-height:1.4;
}

.info-box{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:12px;
    padding:10px 12px;
    margin-bottom:8px;
    font-size:13px;
    color:#475569;
    display:flex;
    align-items:center;
    gap:8px;
}

.keperluan-box{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:12px;
    padding:10px 12px;
    margin-top:10px;
    margin-bottom:12px;
}

.keperluan-box small{
    display:block;
    color:#64748b;
    margin-bottom:4px;
    font-size:11px;
}

.keperluan-box p{
    margin:0;
    color:#0f172a;
    font-size:13px;
    line-height:1.5;
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.status-badge{
    display:inline-block;
    padding:7px 12px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
    margin-bottom:14px;
}

.status-pending{
    background:rgba(245,158,11,.12);
    color:#d97706;
}

.status-success{
    background:rgba(34,197,94,.12);
    color:#16a34a;
}

.status-danger{
    background:rgba(239,68,68,.12);
    color:#dc2626;
}

.action-group{
    display:flex;
    gap:8px;
}

.btn-approve{
    flex:1;
    border:none;
    border-radius:10px;
    padding:8px;
    background:rgba(34,197,94,.12);
    color:#16a34a;
    font-size:13px;
    font-weight:600;
}

.btn-approve:hover{
    background:rgba(34,197,94,.2);
}

.btn-reject{
    flex:1;
    border:none;
    border-radius:10px;
    padding:8px;
    background:rgba(239,68,68,.12);
    color:#dc2626;
    font-size:13px;
    font-weight:600;
}

.btn-reject:hover{
    background:rgba(239,68,68,.2);
}

.empty-card{
    background:white;
    border-radius:20px;
    padding:60px 20px;
    text-align:center;
    box-shadow:0 4px 12px rgba(0,0,0,.04);
}

@media(max-width:768px){

    .section-header h4{
        font-size:18px;
    }

    .section-header p{
        font-size:12px;
    }

    .peminjaman-card{
        padding:14px;
        border-radius:16px;
    }

    .card-title{
        font-size:14px;
        margin-bottom:10px;
    }

    .info-box{
        background:#f8fafc;
        border:1px solid #e2e8f0;
        border-radius:10px;
        padding:8px 10px;
        font-size:12px;
        color:#475569;
        display:flex;
        align-items:center;
        gap:6px;
        height:100%;
        overflow:hidden;
    }

    .info-box i{
        color:#4f46e5;
        flex-shrink:0;
    }

    .keperluan-box{
        padding:8px 10px;
    }

    .keperluan-box p{
        font-size:11px;
    }

    .status-badge{
        font-size:10px;
        padding:6px 10px;
    }

    .btn-approve,
    .btn-reject{
        font-size:11px;
        padding:7px;
    }
}

</style>

<div class="section-header">

    <h4>Data Peminjaman</h4>

    <p>Kelola pengajuan peminjaman ruangan</p>

</div>

<div class="row g-3">

    @forelse($data as $item)

    <div class="col-6 col-md-6 col-lg-4">

        <div class="peminjaman-card">

            <div class="card-title">
                {{ $item->kelas->nama_kelas }}
            </div>

            <div class="row g-2 mb-3">

                <div class="col-6">
                    <div class="info-box">
                        <i class="bi bi-person"></i>
                        {{ $item->user->name }}
                    </div>
                </div>

                <div class="col-6">
                    <div class="info-box">
                        <i class="bi bi-card-text"></i>
                        {{ $item->user->nim }}
                    </div>
                </div>

                <div class="col-6">
                    <div class="info-box">
                        <i class="bi bi-book"></i>
                        {{ $item->user->prodi }}
                    </div>
                </div>

                <div class="col-6">
                    <div class="info-box">
                        <i class="bi bi-mortarboard"></i>
                        {{ $item->user->fakultas->nama_fakultas ?? '-' }}
                    </div>
                </div>

                <div class="col-6">
                    <div class="info-box">
                        <i class="bi bi-calendar-event"></i>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </div>
                </div>

                <div class="col-6">
                    <div class="info-box">
                        <i class="bi bi-clock"></i>
                        {{ substr($item->jam_mulai,0,5) }}
                        -
                        {{ substr($item->jam_selesai,0,5) }}
                    </div>
                </div>

            </div>

            <div class="keperluan-box">
                <small>Keperluan</small>
                <p>{{ $item->keperluan }}</p>
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

                <span class="status-badge status-pending">
                    Pending
                </span>

            @endif

            @if($item->status == 'pending')

            <div class="action-group">

                <form action="{{ route('peminjaman.approve',$item->id) }}"
                      method="POST"
                      class="flex-fill">

                    @csrf
                    @method('PUT')

                    <button class="btn-approve w-100">
                        Approve
                    </button>

                </form>

                <form action="{{ route('peminjaman.reject',$item->id) }}"
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