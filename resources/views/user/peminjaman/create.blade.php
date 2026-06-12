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

    .form-card{
        background: white;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.04);
    }

    .kelas-info{
        background: #f8fafc;
        border-radius: 18px;
        padding: 18px;
        margin-bottom: 28px;
        border: 1px solid #e2e8f0;
    }

    .kelas-info h5{
        margin: 0;
        font-weight: 700;
        color: #0f172a;
    }

    .kelas-info small{
        color: #64748b;
    }

    .form-label{
        font-weight: 600;
        margin-bottom: 8px;
        color: #334155;
    }

    .form-control{
        border-radius: 14px;
        padding: 12px 16px;
        border: 1px solid #dbeafe;
        box-shadow: none !important;
    }

    .form-control:focus{
        border-color: #4f46e5;
    }

    .submit-btn{
        width: 100%;
        border: none;
        border-radius: 16px;
        padding: 14px;
        background: #4f46e5;
        color: white;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .submit-btn:hover{
        background: #4338ca;
    }

    .success-alert{
        background: rgba(34,197,94,0.12);
        color: #16a34a;
        padding: 14px 18px;
        border-radius: 14px;
        margin-bottom: 22px;
        font-weight: 500;
    }

</style>

<!-- TOPBAR -->
<div class="page-topbar d-flex justify-content-between align-items-center">

    <div>

        <h3>Ajukan Peminjaman</h3>

        <p>
            Isi data peminjaman ruangan dengan lengkap
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

<!-- FORM -->
<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="form-card">

            <!-- INFO KELAS -->
            <div class="kelas-info">

                <h5>{{ $kelas->nama_kelas }}</h5>

                <small>
                    {{ $kelas->gedung->nama_gedung }}
                    •
                    {{ $kelas->gedung->fakultas->nama_fakultas }}
                </small>

            </div>

            <!-- ALERT -->
            @if(session('success'))

                <div class="success-alert">
                    {{ session('success') }}
                </div>

            @endif

            <!-- FORM -->
            <form action="{{ route('peminjaman.store') }}"
                  method="POST">

                @csrf

                <input type="hidden"
                       name="kelas_id"
                       value="{{ $kelas->id }}">

                <!-- TANGGAL -->
                <div class="mb-4">

                    <label class="form-label">
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           required>

                </div>

                <!-- JAM -->
                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Jam Mulai
                        </label>

                        <input type="time"
                               name="jam_mulai"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Jam Selesai
                        </label>

                        <input type="time"
                               name="jam_selesai"
                               class="form-control"
                               required>

                    </div>

                </div>

                <!-- KEPERLUAN -->
                <div class="mb-4">

                    <label class="form-label">
                        Keperluan
                    </label>

                    <textarea name="keperluan"
                              rows="4"
                              class="form-control"
                              placeholder="Mata kuliah, Program studi, Seminar, dll"
                              required></textarea>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="submit-btn">

                    Kirim Pengajuan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection