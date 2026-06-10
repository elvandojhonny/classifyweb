@extends('layouts.admin')

@section('title', 'Akun')

@section('page-title', 'Akun')

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
        USER CARD
    ========================== */

    .user-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        transition: 0.3s ease;
        height: 100%;
    }

    .user-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 14px 28px rgba(0,0,0,0.08);
    }

    .user-header{
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 20px;
    }

    .user-avatar{
        width: 65px;
        height: 65px;
        border-radius: 18px;
        background: linear-gradient(135deg,#4f46e5,#6366f1);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 700;
        box-shadow: 0 10px 24px rgba(79,70,229,0.25);
    }

    .user-name{
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 4px;
    }

    .user-email{
        color: #64748b;
        font-size: 14px;
    }

    .info-box{
        background: #f8fafc;
        border-radius: 16px;
        padding: 14px 16px;
        margin-bottom: 12px;
        border: 1px solid #e2e8f0;
    }

    .info-box small{
        color: #64748b;
        display: block;
        margin-bottom: 4px;
    }

    .info-box strong{
        color: #0f172a;
        font-size: 15px;
    }

    /* =========================
        BADGE
    ========================== */

    .role-badge{
        display: inline-block;
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .role-admin{
        background: rgba(239,68,68,0.12);
        color: #dc2626;
    }

    .role-user{
        background: rgba(59,130,246,0.12);
        color: #2563eb;
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

        <h4>Data Akun</h4>

        <p>
            Kelola akun pengguna sistem
        </p>

    </div>

    <a href="{{ route('users.create') }}"
       class="btn-add">

        <i class="bi bi-plus-lg"></i>
        Tambah Akun

    </a>

</div>

<!-- GRID -->
<div class="row g-4">

    @forelse($users as $u)

    <div class="col-md-4">

        <div class="user-card">

            <!-- HEADER -->
            <div class="user-header">

                <div class="user-avatar">
                    {{ strtoupper(substr($u->name,0,1)) }}
                </div>

                <div>

                    <div class="user-name">
                        {{ $u->name }}
                    </div>

                    <div class="user-email">
                        {{ $u->email }}
                    </div>

                </div>

            </div>

            <!-- INFO -->
            <div class="info-box">

                <small>NIM</small>

                <strong>
                    {{ $u->nim }}
                </strong>

            </div>

            <div class="info-box">

                <small>Program Studi</small>

                <strong>
                    {{ $u->prodi }}
                </strong>

            </div>

            <!-- ROLE -->
            <span class="role-badge {{ $u->role == 'admin' ? 'role-admin' : 'role-user' }}">

                {{ strtoupper($u->role) }}

            </span>

            <!-- ACTION -->
            <div class="action-group">

                <a href="{{ route('users.edit',$u->id) }}"
                   class="btn-edit">

                    Edit

                </a>

                <form action="{{ route('users.destroy',$u->id) }}"
                      method="POST"
                      class="flex-fill">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Yakin hapus user?')"
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
                Data Akun Kosong
            </h5>

            <p class="text-muted mb-0">
                Belum ada akun yang terdaftar
            </p>

        </div>

    </div>

    @endforelse

</div>

@endsection