@extends('layouts.user')

@section('page-title', 'Riwayat')

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

.riwayat-card{
    background:white;
    border-radius:22px;
    padding:20px;
    border:1px solid rgba(0,0,0,.04);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
    height:100%;
    transition:.3s;
}

.riwayat-card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 24px rgba(0,0,0,.08);
}

.riwayat-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:16px;
}

.riwayat-icon{
    width:52px;
    height:52px;
    border-radius:14px;
    background:rgba(79,70,229,.12);
    color:#4f46e5;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    flex-shrink:0;
}

.riwayat-info{
    flex:1;
    min-width:0;
}

.riwayat-title{
    font-size:18px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:2px;
}

.riwayat-subtitle{
    font-size:13px;
    color:#64748b;
}

.info-box{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:14px;
    padding:12px;
    margin-bottom:10px;
}

.info-box small{
    display:block;
    color:#64748b;
    margin-bottom:4px;
}

.info-box strong{
    color:#0f172a;
    font-size:14px;
}

.keterangan-box{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:14px;
    padding:12px;
    margin-bottom:14px;
}

.keterangan-box small{
    display:block;
    color:#64748b;
    margin-bottom:4px;
}

.keterangan-box p{
    margin:0;
    font-size:13px;
    color:#475569;
    line-height:1.5;
}

.badge-modern{
    padding:8px 14px;
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

.empty-card{
    background:white;
    border-radius:24px;
    padding:60px 20px;
    text-align:center;
    box-shadow:0 4px 14px rgba(0,0,0,.05);
}

/* MOBILE */

@media(max-width:768px){

    .row.g-4{
        --bs-gutter-x:12px;
        --bs-gutter-y:12px;
    }

    .riwayat-card{
        padding:14px;
        border-radius:18px;
    }

    .riwayat-header{
        gap:10px;
        margin-bottom:12px;
    }

    .riwayat-icon{
        width:42px;
        height:42px;
        font-size:18px;
        border-radius:12px;
    }

    .riwayat-title{
        font-size:14px;
    }

    .riwayat-subtitle{
        font-size:11px;
    }

    .info-box,
    .keterangan-box{
        padding:10px;
        margin-bottom:8px;
    }

    .info-box small,
    .keterangan-box small{
        font-size:10px;
    }

    .info-box strong{
        font-size:12px;
    }

    .keterangan-box p{
        font-size:11px;
    }

    .badge-modern{
        font-size:11px;
    }

    .section-header h4{
        font-size:20px;
    }

    .section-header p{
        font-size:13px;
    }
}

@media(max-width:768px){

    .row.g-4{
        --bs-gutter-x:12px;
        --bs-gutter-y:12px;
    }

    .riwayat-card{
        padding:14px;
        border-radius:18px;
    }

    .riwayat-title{
        font-size:13px;
        line-height:1.4;
    }

    .info-box{
        padding:8px;
        margin-bottom:8px;
    }

    .info-box small{
        font-size:10px;
    }

    .info-box strong{
        font-size:11px;
    }

    .keterangan-box{
        padding:8px;
    }

    .keterangan-box p{
        font-size:11px;
        line-height:1.4;
    }

    .badge-modern{
        font-size:10px;
        padding:6px 10px;
    }

    .riwayat-icon{
        width:40px;
        height:40px;
        font-size:16px;
    }
}

</style>

<!-- HEADER -->
<div class="section-header">

    <h4>Riwayat Peminjaman</h4>

    <p>
        Daftar seluruh pengajuan peminjaman ruangan
    </p>

</div>

<!-- GRID -->
<div class="row g-4">

@forelse($riwayat as $item)
<div class="col-6 col-lg-4">

    <div class="riwayat-card">

        <div class="riwayat-header">

            <div class="riwayat-icon">
                <i class="bi bi-clock-history"></i>
            </div>

            <div class="riwayat-info">

                <div class="riwayat-title">
                    {{ $item->kelas->nama_kelas }}
                </div>

                <div class="riwayat-subtitle">
                    Riwayat Peminjaman
                </div>

            </div>

        </div>

        <div class="info-box">
            <small>Gedung</small>
            <strong>
                {{ $item->kelas->gedung->nama_gedung }}
            </strong>
        </div>

        <div class="info-box">
            <small>Fakultas</small>
            <strong>
                {{ $item->kelas->gedung->fakultas->nama_fakultas }}
            </strong>
        </div>

        <div class="info-box">
            <small>Tanggal</small>
            <strong>
                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
            </strong>
        </div>

        <div class="info-box">
            <small>Jam</small>
            <strong>
                {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
            </strong>
        </div>

        <div class="keterangan-box">
            <small>Keperluan</small>

            <p>
                {{ $item->keperluan }}
            </p>
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

</div>

@empty

<div class="col-12">

    <div class="empty-card">

        <h5 class="mb-2">
            Belum Ada Riwayat
        </h5>

        <p class="text-muted mb-0">
            Pengajuan peminjaman akan tampil di sini
        </p>

    </div>

</div>

@endforelse

</div>

@endsection