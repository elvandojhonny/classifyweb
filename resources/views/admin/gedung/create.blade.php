@extends('layouts.admin')

@section('title','Tambah Gedung')
@section('navbar','Tambah Gedung')

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
            Tambah Gedung
        </div>

        <div class="form-subtitle">
            Tambahkan data gedung baru ke dalam sistem
        </div>

    </div>

    <!-- FORM -->
    <form method="POST"
          action="{{ route('gedung.store') }}">

        @csrf

        <!-- FAKULTAS -->
        <div class="mb-4">

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
                        {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>

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

        <!-- NAMA GEDUNG -->
        <div class="mb-4">

            <label class="form-label">

                Nama Gedung

            </label>

            <input type="text"
                   name="nama_gedung"
                   value="{{ old('nama_gedung') }}"
                   class="form-control @error('nama_gedung') is-invalid @enderror"
                   placeholder="Contoh: Gedung A">

            @error('nama_gedung')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-3">

            <button class="btn-modern btn-primary-modern">

                Simpan Gedung

            </button>

            <a href="{{ route('gedung.index') }}"
               class="btn-modern btn-secondary-modern">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection