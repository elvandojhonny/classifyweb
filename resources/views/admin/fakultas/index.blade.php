@extends('layouts.admin')

@section('title', 'Fakultas')

@section('page-title', 'Fakultas')

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

.btn-add{
    background:#4f46e5;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:12px;
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

.fakultas-card{
    background:white;
    border-radius:20px;
    padding:18px;
    border:1px solid #e2e8f0;
    box-shadow:0 4px 12px rgba(0,0,0,.04);
    transition:.25s;
    height:100%;
}

.fakultas-card:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(0,0,0,.08);
}

.fakultas-icon{
    width:52px;
    height:52px;
    border-radius:14px;
    background:rgba(79,70,229,.12);
    color:#4f46e5;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    margin-bottom:14px;
}

.fakultas-title{
    font-size:16px;
    font-weight:700;
    color:#0f172a;
    line-height:1.4;
    margin-bottom:18px;
    min-height:44px;
}

.action-group{
    display:flex;
    gap:8px;
}

.btn-edit{
    flex:1;
    border:none;
    border-radius:10px;
    padding:8px;
    background:rgba(245,158,11,.12);
    color:#d97706;
    font-size:13px;
    font-weight:600;
    text-decoration:none;
    text-align:center;
}

.btn-edit:hover{
    background:rgba(245,158,11,.2);
    color:#b45309;
}

.btn-delete{
    flex:1;
    border:none;
    border-radius:10px;
    padding:8px;
    background:rgba(239,68,68,.12);
    color:#dc2626;
    font-size:13px;
    font-weight:600;
}

.btn-delete:hover{
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

    .section-header{
        gap:12px;
    }

    .section-header h4{
        font-size:18px;
    }

    .section-header p{
        font-size:12px;
    }

    .btn-add{
        padding:8px 12px;
        font-size:12px;
    }

    .fakultas-card{
        padding:14px;
        border-radius:16px;
    }

    .fakultas-icon{
        width:42px;
        height:42px;
        font-size:18px;
        margin-bottom:10px;
    }

    .fakultas-title{
        font-size:13px;
        min-height:38px;
        margin-bottom:12px;
    }

    .btn-edit,
    .btn-delete{
        font-size:11px;
        padding:7px;
    }
}

</style>

<!-- HEADER -->
<div class="section-header d-flex justify-content-between align-items-center flex-wrap">

    <div>

        <h4>Data Fakultas</h4>

        <p>Kelola data fakultas kampus</p>

    </div>

    <a href="{{ route('fakultas.create') }}"
       class="btn-add">

        <i class="bi bi-plus-lg"></i>
        Tambah Fakultas

    </a>

</div>

<!-- GRID -->
<div class="row g-3">

    @forelse($fakultas as $item)

    <div class="col-6 col-md-4 col-lg-3">

        <div class="fakultas-card">

            <div class="fakultas-icon">
                <i class="bi bi-bank"></i>
            </div>

            <div class="fakultas-title">
                {{ $item->nama_fakultas }}
            </div>

            <div class="action-group">

                <a href="{{ route('fakultas.edit',$item->id) }}"
                   class="btn-edit">

                    Edit

                </a>

                <form action="{{ route('fakultas.destroy',$item->id) }}"
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

            <h5>Data Fakultas Kosong</h5>

            <p class="text-muted mb-0">
                Belum ada data fakultas yang tersedia
            </p>

        </div>

    </div>

    @endforelse

</div>

@endsection