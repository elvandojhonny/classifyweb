@extends('layouts.admin')

@section('title','Edit Akun')
@section('page-title','Edit Akun')

@section('content')

<style>

    .form-card{
        background:#fff;
        border-radius:24px;
        padding:24px;
        border:1px solid rgba(0,0,0,.05);
        box-shadow:0 4px 14px rgba(0,0,0,.05);
    }

    .form-title{
        font-size:22px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:4px;
    }

    .form-subtitle{
        font-size:14px;
        color:#64748b;
        margin-bottom:24px;
    }

    .form-label{
        font-size:13px;
        font-weight:600;
        color:#334155;
        margin-bottom:8px;
    }

    .form-control,
    .form-select{
        height:48px;
        border-radius:14px;
        border:1px solid #e2e8f0;
        padding:0 14px;
        font-size:14px;
        box-shadow:none !important;
        transition:.3s;
    }

    .form-control:focus,
    .form-select:focus{
        border-color:#4f46e5;
    }

    .form-hint{
        font-size:12px;
        color:#64748b;
        margin-top:6px;
    }

    .btn-modern{
        border:none;
        border-radius:14px;
        padding:11px 18px;
        font-size:14px;
        font-weight:600;
        transition:.3s;
    }

    .btn-primary-modern{
        background:#4f46e5;
        color:white;
    }

    .btn-primary-modern:hover{
        background:#4338ca;
        color:white;
    }

    .btn-secondary-modern{
        background:#f1f5f9;
        color:#334155;
        text-decoration:none;
    }

    .btn-secondary-modern:hover{
        background:#e2e8f0;
        color:#0f172a;
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
            font-size:12px;
            margin-bottom:18px;
        }

        .form-label{
            font-size:12px;
        }

        .form-control,
        .form-select{
            height:44px;
            font-size:13px;
        }

        .btn-modern{
            width:100%;
            text-align:center;
            justify-content:center;
        }

        .action-buttons{
            flex-direction:column;
        }

    }

</style>

<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="form-card">

            <div class="form-title">
                Edit Data Akun
            </div>

            <div class="form-subtitle">
                Perbarui informasi akun pengguna sistem
            </div>

            <form method="POST"
                  action="{{ route('users.update', $user->id) }}">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- NAMA -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Masukkan nama lengkap">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- EMAIL -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Masukkan email">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- PASSWORD -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Password Baru
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Kosongkan jika tidak diubah">

                        <div class="form-hint">
                            Kosongkan jika tidak ingin mengubah password
                        </div>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- NIM -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            NIM
                        </label>

                        <input type="text"
                               name="nim"
                               value="{{ old('nim', $user->nim) }}"
                               class="form-control @error('nim') is-invalid @enderror"
                               placeholder="Masukkan NIM">

                        @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- PRODI -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Program Studi
                        </label>

                        <input type="text"
                               name="prodi"
                               value="{{ old('prodi', $user->prodi) }}"
                               class="form-control @error('prodi') is-invalid @enderror"
                               placeholder="Contoh: Teknik Informatika">

                        @error('prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- FAKULTAS -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Fakultas
                        </label>

                        <select name="fakultas_id"
                                class="form-select @error('fakultas_id') is-invalid @enderror">

                            <option value="">
                                -- Pilih Fakultas --
                            </option>

                            @foreach($fakultas as $f)

                                <option value="{{ $f->id }}"
                                    {{ old('fakultas_id', $user->fakultas_id) == $f->id ? 'selected' : '' }}>

                                    {{ $f->nama_fakultas }}

                                </option>

                            @endforeach

                        </select>

                        @error('fakultas_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- ROLE -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Role Akun
                        </label>

                        <select name="role"
                                class="form-select @error('role') is-invalid @enderror">

                            <option value="user"
                                {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                User
                            </option>

                            <option value="admin"
                                {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                Admin Fakultas
                            </option>

                            @if(auth()->user()->role == 'superadmin')

                                <option value="superadmin"
                                    {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>
                                    Super Admin
                                </option>

                            @endif

                        </select>

                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="d-flex gap-2 mt-3 action-buttons">

                    <button class="btn-modern btn-primary-modern">

                        <i class="bi bi-check-lg me-1"></i>
                        Update Akun

                    </button>

                    <a href="{{ route('users.index') }}"
                       class="btn-modern btn-secondary-modern">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection