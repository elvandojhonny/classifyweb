@extends('layouts.admin')

@section('title', 'Kelas')

@section('page-title', 'Data Kelas')

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

    /* =========================
        CARD
    ========================== */

    .kelas-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        transition: 0.3s ease;
        height: 100%;
    }

    .kelas-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 14px 28px rgba(0,0,0,0.08);
    }

    .kelas-icon{
        width: 60px;
        height: 60px;
        border-radius: 18px;
        background: rgba(245,158,11,0.12);
        color: #d97706;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .kelas-title{
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 10px;
    }

    .kelas-subtitle{
        color: #64748b;
        font-size: 14px;
        margin-bottom: 16px;
    }

    .kelas-description{
        color: #475569;
        font-size: 14px;
        line-height: 1.6;
        min-height: 60px;
        margin-bottom: 20px;
    }

    /* =========================
        ACTION
    ========================== */

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

    /* =========================
        EMPTY
    ========================== */

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

        <h4>Data Kelas</h4>

        <p>
            Kelola ruang kelas kampus
        </p>

    </div>

    <a href="{{ route('kelas.create') }}"
       class="btn-add">

        <i class="bi bi-plus-lg"></i>
        Tambah Kelas

    </a>

</div>

<!-- GRID -->
<div class="row g-4">

    @forelse($kelas as $item)

    <div class="col-md-4">

        <div class="kelas-card">

            <!-- ICON -->
            <div class="kelas-icon">
                <i class="bi bi-door-open"></i>
            </div>

            <!-- TITLE -->
            <div class="kelas-title">
                {{ $item->nama_kelas }}
            </div>

            <!-- GEDUNG -->
            <div class="kelas-subtitle">

                <i class="bi bi-building"></i>

                {{ $item->gedung->nama_gedung ?? '-' }}

            </div>

            <!-- DESCRIPTION -->
            <div class="kelas-description">

                {{ $item->keterangan ?? 'Tidak ada keterangan tersedia.' }}

            </div>

            <!-- ACTION -->
            <div class="action-group">

                <a href="{{ route('kelas.edit', $item->id) }}"
                   class="btn-edit">

                    Edit

                </a>

                <form action="{{ route('kelas.destroy', $item->id) }}"
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
                Data Kelas Kosong
            </h5>

            <p class="text-muted mb-0">
                Belum ada data kelas yang tersedia
            </p>

        </div>

    </div>

    @endforelse

</div>

@endsection