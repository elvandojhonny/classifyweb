@extends('layouts.user')

@section('content')

<style>

    .page-topbar{
        background: white;
        border-radius: 22px;
        padding: 22px 26px;
        margin-bottom: 28px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }

    .page-topbar h3{
        margin: 0;
        font-weight: 700;
        color: #0f172a;
    }

    .page-topbar p{
        margin: 4px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .profile-user{
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #4f46e5;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .kelas-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        height: 100%;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        transition: 0.3s ease;
    }

    .kelas-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 14px 28px rgba(0,0,0,0.08);
    }

    .kelas-badge{
        font-size: 12px;
        padding: 6px 12px;
        border-radius: 10px;
        font-weight: 600;
    }

    .badge-id{
        background: #f1f5f9;
        color: #475569;
    }

    .badge-available{
        background: rgba(34,197,94,0.12);
        color: #16a34a;
    }

    .kelas-title{
        font-size: 28px;
        font-weight: 700;
        color: #0f172a;
        margin-top: 18px;
        margin-bottom: 20px;
    }

    .kelas-info{
        color: #475569;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .kelas-btn{
        width: 100%;
        border: none;
        padding: 13px;
        border-radius: 14px;
        background: #4f46e5;
        color: white;
        font-weight: 600;
        margin-top: 20px;
        transition: 0.3s ease;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .kelas-btn:hover{
        background: #4338ca;
    }

</style>

<!-- TOPBAR -->
<div class="page-topbar d-flex justify-content-between align-items-center">

    <div>

        <h3>Peminjaman Kelas</h3>

        <p>
            Ajukan peminjaman ruangan dengan mudah
        </p>

    </div>

    <div class="d-flex align-items-center gap-3">

        <div class="text-end">
            <strong>{{ auth()->user()->name }}</strong><br>
            <small class="text-muted">User</small>
        </div>

        <div class="profile-user">
            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
        </div>

    </div>

</div>

<!-- GRID -->
<div class="row g-4">

    @forelse($kelas as $item)

    <div class="col-md-4">

        <div class="kelas-card">

            <!-- BADGE -->
            <div class="d-flex justify-content-between align-items-center">

                <span class="kelas-badge badge-id">
                    ID #{{ $item->id }}
                </span>

                <span class="kelas-badge badge-available">
                    Tersedia
                </span>

            </div>

            <!-- TITLE -->
            <div class="kelas-title">
                {{ $item->nama_kelas }}
            </div>

            <!-- INFO -->
            <div class="kelas-info">
                <i class="bi bi-building"></i>
                {{ $item->gedung->nama_gedung }}
            </div>

            <div class="kelas-info">
                <i class="bi bi-mortarboard"></i>
                {{ $item->gedung->fakultas->nama_fakultas }}
            </div>

            <!-- BUTTON -->
            <a href="{{ route('peminjaman.create', $item->id) }}"
               class="kelas-btn">

                Ajukan Kelas

            </a>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="bg-white rounded-4 p-5 text-center shadow-sm">

            <p class="text-muted mb-0">
                Tidak ada kelas tersedia
            </p>

        </div>

    </div>

    @endforelse

</div>

@endsection