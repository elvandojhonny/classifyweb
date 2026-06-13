@extends('layouts.admin')

@section('title', 'Gedung')

@section('page-title', 'Gedung')

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

.btn-add{
    background:#4f46e5;
    color:white;
    border:none;
    padding:12px 18px;
    border-radius:14px;
    font-weight:600;
    text-decoration:none;
    display:flex;
    align-items:center;
    gap:8px;
}

.btn-add:hover{
    background:#4338ca;
    color:white;
}

/* CARD */

.gedung-card{
    background:white;
    border-radius:22px;
    padding:20px;
    border:1px solid rgba(0,0,0,.04);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
    transition:.3s;
    height:100%;
}

.gedung-card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 24px rgba(0,0,0,.08);
}

.gedung-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:16px;
}

.gedung-icon{
    width:52px;
    height:52px;
    border-radius:14px;
    background:rgba(34,197,94,.12);
    color:#16a34a;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    flex-shrink:0;
}

.gedung-info{
    flex:1;
    min-width:0;
}

.gedung-title{
    font-size:18px;
    font-weight:700;
    color:#0f172a;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.gedung-subtitle{
    font-size:13px;
    color:#64748b;
}

.info-box{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:14px;
    padding:12px;
    margin-bottom:14px;
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

.action-group{
    display:flex;
    gap:8px;
}

.btn-edit{
    flex:1;
    border:none;
    border-radius:12px;
    padding:10px;
    background:rgba(245,158,11,.12);
    color:#d97706;
    text-decoration:none;
    text-align:center;
    font-weight:600;
}

.btn-delete{
    flex:1;
    border:none;
    border-radius:12px;
    padding:10px;
    background:rgba(239,68,68,.12);
    color:#dc2626;
    font-weight:600;
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

    .gedung-card{
        padding:14px;
        border-radius:18px;
    }

    .gedung-header{
        gap:10px;
        margin-bottom:12px;
    }

    .gedung-icon{
        width:42px;
        height:42px;
        font-size:18px;
        border-radius:12px;
    }

    .gedung-title{
        font-size:14px;
    }

    .gedung-subtitle{
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

    .btn-edit,
    .btn-delete{
        padding:8px;
        font-size:11px;
        border-radius:10px;
    }

    .btn-add{
        padding:10px 14px;
        font-size:13px;
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
<div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-2">

    <div>
        <h4>Data Gedung</h4>
        <p>Kelola data gedung kampus</p>
    </div>

    <a href="{{ route('gedung.create') }}"
       class="btn-add">

        <i class="bi bi-plus-lg"></i>
        Tambah

    </a>

</div>

<!-- GRID -->
<div class="row g-4">

@forelse($gedung as $item)

<div class="col-6 col-md-6 col-lg-4">

    <div class="gedung-card">

        <div class="gedung-header">

            <div class="gedung-icon">
                <i class="bi bi-building"></i>
            </div>

            <div class="gedung-info">

                <div class="gedung-title">
                    {{ $item->nama_gedung }}
                </div>

                <div class="gedung-subtitle">
                    Gedung Kampus
                </div>

            </div>

        </div>

        <div class="info-box">

            <small>Fakultas</small>

            <strong>
                {{ $item->fakultas->nama_fakultas ?? '-' }}
            </strong>

        </div>

        <div class="action-group">

            <a href="{{ route('gedung.edit',$item->id) }}"
               class="btn-edit">

                Edit

            </a>

            <form action="{{ route('gedung.destroy',$item->id) }}"
                  method="POST"
                  class="flex-fill">

                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('Yakin hapus data?')"
                        class="btn-delete w-100">

                    Hapus

                </button>

            </form>

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="empty-card">

        <h5 class="mb-2">
            Data Gedung Kosong
        </h5>

        <p class="text-muted mb-0">
            Belum ada data gedung yang tersedia
        </p>

    </div>

</div>

@endforelse

</div>

@endsection