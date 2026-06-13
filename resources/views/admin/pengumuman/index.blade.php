@extends('layouts.admin')

@section('title', 'Pengumuman')

@section('page-title', 'Pengumuman')

@section('content')

<style>

.section-header{
    margin-bottom:24px;
}

.section-title{
    font-size:22px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:4px;
}

.section-subtitle{
    font-size:14px;
    color:#64748b;
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

.announcement-card{
    background:white;
    border-radius:20px;
    padding:18px;
    border:1px solid #e2e8f0;
    box-shadow:0 4px 12px rgba(0,0,0,.04);
    transition:.25s;
    height:100%;
}

.announcement-card:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(0,0,0,.08);
}

.announcement-title{
    font-size:16px;
    font-weight:700;
    color:#0f172a;
    line-height:1.5;
    margin-bottom:6px;
}

.announcement-date{
    font-size:12px;
    color:#94a3b8;
}

.announcement-content{
    margin-top:12px;
    color:#475569;
    font-size:13px;
    line-height:1.6;

    display:-webkit-box;
    -webkit-line-clamp:3;
    -webkit-box-orient:vertical;
    overflow:hidden;

    min-height:62px;
}

.badge-modern{
    padding:6px 10px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
}

.badge-active{
    background:rgba(34,197,94,.12);
    color:#16a34a;
}

.badge-inactive{
    background:rgba(148,163,184,.15);
    color:#64748b;
}

.action-group{
    display:flex;
    gap:8px;
    margin-top:14px;
}

.btn-edit{
    flex:1;
    text-align:center;
    text-decoration:none;
    border-radius:10px;
    padding:8px;
    font-size:13px;
    font-weight:600;
    background:rgba(245,158,11,.12);
    color:#d97706;
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
    font-size:13px;
    font-weight:600;
    background:rgba(239,68,68,.12);
    color:#dc2626;
}

.btn-delete:hover{
    background:rgba(239,68,68,.2);
}

.empty-card{
    background:white;
    border-radius:20px;
    padding:60px 20px;
    text-align:center;
    border:1px dashed #cbd5e1;
}

.empty-icon{
    font-size:48px;
    color:#cbd5e1;
    margin-bottom:12px;
}

.empty-title{
    font-size:20px;
    font-weight:700;
    color:#334155;
}

.empty-subtitle{
    color:#94a3b8;
    font-size:14px;
}

@media(max-width:768px){

    .section-title{
        font-size:18px;
    }

    .section-subtitle{
        font-size:12px;
    }

    .btn-add{
        padding:8px 12px;
        font-size:12px;
    }

    .announcement-card{
        padding:14px;
        border-radius:16px;
    }

    .announcement-title{
        font-size:13px;
    }

    .announcement-content{
        font-size:11px;
        min-height:50px;
    }

    .badge-modern{
        font-size:10px;
        padding:5px 8px;
    }

    .btn-edit,
    .btn-delete{
        font-size:11px;
        padding:7px;
    }
}

</style>

<div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-2">

    <div>

        <div class="section-title">
            Pengumuman Sistem
        </div>

        <div class="section-subtitle">
            Kelola informasi dan pemberitahuan untuk pengguna sistem
        </div>

    </div>

    <a href="{{ route('pengumuman.create') }}"
       class="btn-add">

        <i class="bi bi-plus-lg"></i>
        Tambah

    </a>

</div>

<div class="row g-3">

    @forelse($pengumuman as $item)

    <div class="col-6 col-md-6 col-lg-4">

        <div class="announcement-card">

            <div class="d-flex justify-content-between align-items-start gap-2">

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

            <div class="announcement-content">
                {{ $item->isi }}
            </div>

            <div class="action-group">

                <a href="{{ route('pengumuman.edit',$item->id) }}"
                   class="btn-edit">

                    Edit

                </a>

                <form action="{{ route('pengumuman.destroy',$item->id) }}"
                      method="POST"
                      class="flex-fill">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Hapus pengumuman ini?')"
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