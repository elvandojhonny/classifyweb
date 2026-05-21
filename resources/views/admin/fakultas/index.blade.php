@extends('layouts.admin')

@section('title', 'Fakultas')

@section('page-title', 'Data Fakultas')

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

    .btn-add{
        background: #4f46e5;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add:hover{
        background: #4338ca;
        color: white;
    }

    .fakultas-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        transition: 0.3s ease;
        height: 100%;
    }

    .fakultas-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 14px 28px rgba(0,0,0,0.08);
    }

    .fakultas-icon{
        width: 60px;
        height: 60px;
        border-radius: 18px;
        background: rgba(79,70,229,0.12);
        color: #4f46e5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .fakultas-title{
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 18px;
    }

    .action-group{
        display: flex;
        gap: 10px;
    }

    .btn-edit{
        flex: 1;
        border: none;
        border-radius: 12px;
        padding: 10px;
        background: rgba(245,158,11,0.12);
        color: #d97706;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        transition: 0.3s ease;
    }

    .btn-edit:hover{
        background: rgba(245,158,11,0.2);
        color: #b45309;
    }

    .btn-delete{
        flex: 1;
        border: none;
        border-radius: 12px;
        padding: 10px;
        background: rgba(239,68,68,0.12);
        color: #dc2626;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-delete:hover{
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
<div class="d-flex justify-content-between align-items-center section-header">

    <div>

        <h4>Data Fakultas</h4>

        <p>
            Kelola data fakultas kampus
        </p>

    </div>

    <a href="{{ route('fakultas.create') }}"
       class="btn-add">

        <i class="bi bi-plus-lg"></i>
        Tambah Fakultas

    </a>

</div>

<!-- GRID -->
<div class="row g-4">

    @forelse($fakultas as $item)

    <div class="col-md-4">

        <div class="fakultas-card">

            <!-- ICON -->
            <div class="fakultas-icon">
                <i class="bi bi-bank"></i>
            </div>

            <!-- TITLE -->
            <div class="fakultas-title">
                {{ $item->nama_fakultas }}
            </div>

            <!-- ACTION -->
            <div class="action-group">

                <a href="{{ route('fakultas.edit', $item->id) }}"
                   class="btn-edit">

                    Edit

                </a>

                <form action="{{ route('fakultas.destroy', $item->id) }}"
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
                Data Fakultas Kosong
            </h5>

            <p class="text-muted mb-0">
                Belum ada data fakultas yang tersedia
            </p>

        </div>

    </div>

    @endforelse

</div>

@endsection