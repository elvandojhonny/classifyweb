@extends('layouts.admin')

@section('title', 'Tambah Fakultas')
@section('page-title', 'Tambah Fakultas')

@section('content')

<style>

    .page-header{
        margin-bottom: 30px;
    }

    .page-header h4{
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 5px;
    }

    .page-header p{
        color: #64748b;
        margin: 0;
    }

    .form-card{
        background: #fff;
        border-radius: 24px;
        padding: 30px;
        border: 1px solid rgba(0,0,0,.04);
        box-shadow: 0 8px 24px rgba(15,23,42,.06);
    }

    .form-label{
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
    }

    .form-control{
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 12px 16px;
        min-height: 52px;
        box-shadow: none !important;
        transition: .3s ease;
    }

    .form-control:focus{
        border-color: #4f46e5;
    }

    .invalid-feedback{
        display: block;
    }

    .action-group{
        display: flex;
        gap: 12px;
        margin-top: 10px;
    }

    .btn-save{
        border: none;
        background: #4f46e5;
        color: white;
        padding: 12px 24px;
        border-radius: 14px;
        font-weight: 600;
        transition: .3s ease;
    }

    .btn-save:hover{
        background: #4338ca;
    }

    .btn-back{
        text-decoration: none;
        background: #f1f5f9;
        color: #334155;
        padding: 12px 24px;
        border-radius: 14px;
        font-weight: 600;
        transition: .3s ease;
    }

    .btn-back:hover{
        background: #e2e8f0;
        color: #0f172a;
    }

</style>

<!-- HEADER -->
<div class="page-header">

    <h4>Tambah Fakultas</h4>

    <p>
        Tambahkan data fakultas baru ke dalam sistem
    </p>

</div>

<!-- FORM -->
<div class="form-card">

    <form method="POST"
          action="{{ route('fakultas.store') }}">

        @csrf

        <div class="mb-4">

            <label class="form-label">
                Nama Fakultas
            </label>

            <input type="text"
                   name="nama_fakultas"
                   value="{{ old('nama_fakultas') }}"
                   class="form-control @error('nama_fakultas') is-invalid @enderror"
                   placeholder="Masukkan nama fakultas">

            @error('nama_fakultas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="action-group">

            <button type="submit"
                    class="btn-save">

                Simpan Fakultas

            </button>

            <a href="{{ route('fakultas.index') }}"
               class="btn-back">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection