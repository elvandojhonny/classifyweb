@extends('layouts.admin')

@section('title', 'Tambah Akun')

@section('page-title', 'Tambah Akun')

@section('content')

<style>

    .form-title{
    font-size:22px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:4px;
}

.form-subtitle{
    color:#64748b;
    font-size:14px;
    margin-bottom:28px;
}

.form-card{
    background:white;
    border-radius:22px;
    padding:22px;
    border:1px solid rgba(0,0,0,.05);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
    height:100%;
}

.card-section-title{
    font-size:16px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:18px;
}

.form-label{
    font-size:13px;
    font-weight:600;
    color:#475569;
    margin-bottom:8px;
}

.form-control,
.form-select{
    min-height:48px;
    border-radius:14px;
    border:1px solid #e2e8f0;
    font-size:14px;
    box-shadow:none !important;
}

.form-control:focus,
.form-select:focus{
    border-color:#4f46e5;
}

.submit-btn{
    width:100%;
    background:#4f46e5;
    color:white;
    border:none;
    border-radius:16px;
    padding:14px;
    font-weight:600;
    margin-top:24px;
}

.submit-btn:hover{
    background:#4338ca;
}

@media(max-width:768px){

    .form-card{
        padding:16px;
        border-radius:18px;
    }

    .form-title{
        font-size:18px;
    }

    .form-subtitle{
        font-size:13px;
    }

    .card-section-title{
        font-size:15px;
    }
}

</style>

<div class="mb-4">

    <div class="form-title">
        Tambah Akun
    </div>

    <div class="form-subtitle">
        Tambahkan akun pengguna baru ke dalam sistem
    </div>

</div>

<form method="POST"
      action="{{ route('users.store') }}">

    @csrf

    <div class="row g-4">

        <!-- DATA AKUN -->
        <div class="col-lg-6">

            <div class="form-card">

                <div class="card-section-title">
                    Data Akun
                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Lengkap
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Masukkan nama lengkap"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Masukkan email"
                           required>

                </div>

                <div>

                    <label class="form-label">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>

                </div>

            </div>

        </div>

        <!-- AKADEMIK -->
        <div class="col-lg-6">

            <div class="form-card">

                <div class="card-section-title">
                    Akademik & Hak Akses
                </div>

                <div class="mb-3">

                    <label class="form-label">
                        NIM
                    </label>

                    <input type="text"
                           name="nim"
                           class="form-control"
                           placeholder="Masukkan NIM"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Program Studi
                    </label>

                    <input type="text"
                           name="prodi"
                           class="form-control"
                           placeholder="Masukkan program studi"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fakultas
                    </label>

                    <select name="fakultas_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Fakultas --
                        </option>

                        @foreach($fakultas as $f)

                            <option value="{{ $f->id }}">
                                {{ $f->nama_fakultas }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="form-label">
                        Role Akun
                    </label>

                    <select name="role"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option value="user">
                            User
                        </option>

                        <option value="admin">
                            Admin Fakultas
                        </option>

                        @if(auth()->user()->role == 'superadmin')
                        <option value="superadmin">
                            Super Admin
                        </option>
                        @endif

                    </select>

                </div>

            </div>

        </div>

    </div>

    <button type="submit"
            class="submit-btn">

        Simpan Akun

    </button>

</form>

@endsection