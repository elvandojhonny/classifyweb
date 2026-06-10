@extends('layouts.admin')

@section('title','Edit Fakultas')
@section('navbar','Edit Fakultas')

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

    .form-control{
        height: 56px;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding-left: 18px;
        transition: 0.3s;
    }

    .form-control:focus{
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
            Edit Fakultas
        </div>

        <div class="form-subtitle">
            Perbarui data fakultas di dalam sistem
        </div>

    </div>

    <!-- FORM -->
    <form method="POST"
          action="{{ route('fakultas.update', $fakultas->id) }}">

        @csrf
        @method('PUT')

        <!-- INPUT -->
        <div class="mb-4">

            <label class="form-label">

                Nama Fakultas

            </label>

            <input type="text"
                   name="nama_fakultas"
                   value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}"
                   class="form-control @error('nama_fakultas') is-invalid @enderror"
                   placeholder="Contoh: Fakultas Teknik">

            @error('nama_fakultas')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-3">

            <button class="btn-modern btn-primary-modern">

                Update Fakultas

            </button>

            <a href="{{ route('fakultas.index') }}"
               class="btn-modern btn-secondary-modern">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection