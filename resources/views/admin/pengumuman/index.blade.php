@extends('layouts.admin')

@section('title', 'Pengumuman')

@section('page-title', 'Pengumuman')

@section('content')

<style>

    .page-header{
        margin-bottom: 30px;
    }

    .page-title{
        font-size: 30px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .page-subtitle{
        color: #64748b;
    }

    .btn-modern{
        border: none;
        border-radius: 16px;
        padding: 14px 22px;
        font-weight: 600;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-primary-modern{
        background: #4f46e5;
        color: white;
    }

    .btn-primary-modern:hover{
        background: #4338ca;
        color: white;
        transform: translateY(-2px);
    }

    /* =========================
        CARD
    ========================== */

    .announcement-card{
        background: white;
        border-radius: 26px;
        padding: 26px;
        height: 100%;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: 0.3s;
    }

    .announcement-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 18px 35px rgba(0,0,0,0.08);
    }

    .announcement-title{
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 8px;
    }

    .announcement-date{
        color: #94a3b8;
        font-size: 13px;
    }

    .announcement-content{
        margin-top: 20px;
        color: #475569;
        line-height: 1.8;
        min-height: 90px;
    }

    /* =========================
        BADGE
    ========================== */

    .badge-modern{
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-active{
        background: rgba(34,197,94,0.12);
        color: #16a34a;
    }

    .badge-inactive{
        background: rgba(148,163,184,0.15);
        color: #64748b;
    }

    /* =========================
        BUTTON ACTION
    ========================== */

    .btn-action{
        border: none;
        border-radius: 14px;
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-edit{
        background: rgba(245,158,11,0.14);
        color: #d97706;
    }

    .btn-edit:hover{
        background: rgba(245,158,11,0.22);
    }

    .btn-delete{
        background: rgba(239,68,68,0.12);
        color: #dc2626;
    }

    .btn-delete:hover{
        background: rgba(239,68,68,0.2);
    }

    /* =========================
        EMPTY
    ========================== */

    .empty-card{
        background: white;
        border-radius: 28px;
        padding: 70px 20px;
        text-align: center;
        border: 1px dashed #cbd5e1;
    }

    .empty-icon{
        font-size: 60px;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .empty-title{
        font-size: 24px;
        font-weight: 700;
        color: #334155;
    }

    .empty-subtitle{
        color: #94a3b8;
        margin-top: 8px;
    }

</style>

<!-- =========================
    HEADER
========================== -->

<div class="d-flex justify-content-between align-items-center page-header">

    <div>

        <div class="page-title">
            Pengumuman Sistem
        </div>

        <div class="page-subtitle">
            Kelola informasi dan pemberitahuan untuk pengguna sistem
        </div>

    </div>

    <a href="{{ route('pengumuman.create') }}"
       class="btn-modern btn-primary-modern">

        + Tambah Pengumuman

    </a>

</div>

<!-- =========================
    CONTENT
========================== -->

<div class="row">

    @forelse($pengumuman as $item)

        <div class="col-md-6 mb-4">

            <div class="announcement-card">

                <!-- TOP -->
                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <div class="announcement-title">

                            {{ $item->judul }}

                        </div>

                        <div class="announcement-date">

                            {{ $item->created_at->format('d M Y') }}

                        </div>

                    </div>

                    @if($item->aktif)

                        <span class="badge-modern badge-active">

                            Aktif

                        </span>

                    @else

                        <span class="badge-modern badge-inactive">

                            Nonaktif

                        </span>

                    @endif

                </div>

                <!-- CONTENT -->
                <div class="announcement-content">

                    {{ $item->isi }}

                </div>

                <!-- ACTION -->
                <div class="d-flex gap-3 mt-4">

                    <a href="{{ route('pengumuman.edit',$item->id) }}"
                       class="btn-action btn-edit text-decoration-none">

                        Edit

                    </a>

                    <form action="{{ route('pengumuman.destroy',$item->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn-action btn-delete"
                                onclick="return confirm('Hapus pengumuman ini?')">

                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="empty-card">

                <div class="empty-icon">
                    <i class="bi bi-megaphone"></i>
                </div>

                <div class="empty-title">
                    Belum Ada Pengumuman
                </div>

                <div class="empty-subtitle">
                    Tambahkan pengumuman baru untuk ditampilkan kepada user
                </div>

            </div>

        </div>

    @endforelse

</div>

@endsection