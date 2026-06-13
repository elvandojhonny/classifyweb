@extends('layouts.user')

@section('page-title', 'Kelas')

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

.kelas-card{
    background:white;
    border-radius:22px;
    padding:20px;
    border:1px solid rgba(0,0,0,.04);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
    height:100%;
    transition:.3s;
}

.kelas-card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 24px rgba(0,0,0,.08);
}

.kelas-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:16px;
}

.kelas-icon{
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

.kelas-info{
    flex:1;
    min-width:0;
}

.kelas-title{
    font-size:18px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:2px;
}

.kelas-subtitle{
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

.btn-pinjam{
    width:100%;
    border:none;
    border-radius:12px;
    padding:12px;
    background:#4f46e5;
    color:white;
    text-decoration:none;
    font-weight:600;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    transition:.3s;
}

.btn-pinjam:hover{
    background:#4338ca;
    color:white;
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

    .kelas-card{
        padding:14px;
        border-radius:18px;
    }

    .kelas-header{
        gap:10px;
        margin-bottom:12px;
    }

    .kelas-icon{
        width:42px;
        height:42px;
        font-size:18px;
        border-radius:12px;
    }

    .kelas-title{
        font-size:14px;
    }

    .kelas-subtitle{
        font-size:11px;
    }

    .info-box{
        padding:10px;
        margin-bottom:8px;
    }

    .info-box small{
        font-size:10px;
    }

    .info-box strong{
        font-size:12px;
    }

    .btn-pinjam{
        padding:10px;
        font-size:12px;
        border-radius:10px;
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

    <h4>Kelola Peminjaman</h4>

    <p>
        Pilih ruangan yang tersedia untuk diajukan peminjaman
    </p>

</div>

<!-- GRID -->
<div class="row g-4">

@forelse($kelas as $item)

<div class="col-6 col-md-6 col-lg-4">

    <div class="kelas-card">

        <div class="kelas-header">

            <div class="kelas-icon">
                <i class="bi bi-door-open"></i>
            </div>

            <div class="kelas-info">

                <div class="kelas-title">
                    {{ $item->nama_kelas }}
                </div>

                <div class="kelas-subtitle">
                    Ruang Kelas
                </div>

            </div>

        </div>

        <div class="info-box">

            <small>Gedung</small>

            <strong>
                {{ $item->gedung->nama_gedung ?? '-' }}
            </strong>

        </div>

        <div class="info-box">

            <small>Fakultas</small>

            <strong>
                {{ $item->gedung->fakultas->nama_fakultas ?? '-' }}
            </strong>

        </div>

        <a href="{{ route('peminjaman.create',$item->id) }}"
           class="btn-pinjam">

            <i class="bi bi-send"></i>
            Ajukan Kelas

        </a>

    </div>

</div>

@empty

<div class="col-12">

    <div class="empty-card">

        <h5 class="mb-2">
            Tidak Ada Kelas
        </h5>

        <p class="text-muted mb-0">
            Belum ada kelas yang tersedia untuk dipinjam
        </p>

    </div>

</div>

@endforelse

</div>

@endsection