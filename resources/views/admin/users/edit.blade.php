@extends('layouts.admin')

@section('title','Edit Akun')
@section('navbar','Edit Akun')

@section('content')

<style>

    .form-card{
        background: white;
        border-radius: 28px;
        padding: 32px;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .form-title{
        font-size: 28px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .form-subtitle{
        color: #64748b;
        margin-bottom: 30px;
    }

    .form-label{
        font-weight: 600;
        color: #334155;
        margin-bottom: 10px;
    }

    .form-control,
    .form-select{
        height: 56px;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding-left: 18px;
        transition: 0.3s;
    }

    .form-control:focus,
    .form-select:focus{
        box-shadow: none;
        border-color: #4f46e5;
    }

    .form-hint{
        color: #64748b;
        font-size: 13px;
        margin-top: 8px;
    }

    .btn-modern{
        border: none;
        border-radius: 16px;
        padding: 14px 26px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-primary-modern{
        background: #4f46e5;
        color: white;
    }

    .btn-primary-modern:hover{
        background: #4338ca;
        transform: translateY(-2px);
    }

    .btn-secondary-modern{
        background: #e2e8f0;
        color: #334155;
        text-decoration: none;
    }

    .btn-secondary-modern:hover{
        background: #cbd5e1;
        color: #0f172a;
    }

</style>

<div class="form-card">

    <!-- HEADER -->
    <div class="mb-4">

        <div class="form-title">
            Edit Data Akun
        </div>

        <div class="form-subtitle">
            Perbarui informasi akun pengguna sistem
        </div>

    </div>

    <!-- FORM -->
    <form method="POST"
          action="{{ route('users.update', $user->id) }}">

        @csrf
        @method('PUT')

        <div class="row">

            <!-- NAMA -->
            <div class="col-md-6 mb-4">

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
            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Email / Username

                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="contoh@email.com">

                @error('email')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <!-- PASSWORD -->
            <div class="col-md-6 mb-4">

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
            <div class="col-md-6 mb-4">

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
            <div class="col-md-6 mb-4">

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
<div class="col-md-6 mb-4">

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
            <div class="col-md-6 mb-4">

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

        <!-- BUTTON -->
        <div class="d-flex gap-3">

            <button class="btn-modern btn-primary-modern">

                Update Akun

            </button>

            <a href="{{ route('users.index') }}"
               class="btn-modern btn-secondary-modern">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection