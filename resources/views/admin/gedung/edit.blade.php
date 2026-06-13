@extends('layouts.admin')

@section('title', 'Edit Gedung')
@section('page-title', 'Edit Gedung')

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

    .form-control,
    .form-select{
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 12px 16px;
        min-height: 52px;
        box-shadow: none !important;
        transition: .3s ease;
    }

    .form-control:focus,
    .form-select:focus{
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

    .btn-update{
        border: none;
        background: #4f46e5;
        color: white;
        padding: 12px 24px;
        border-radius: 14px;
        font-weight: 600;
        transition: .3s ease;
    }

    .btn-update:hover{
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

    <h4>Edit Gedung</h4>

    <p>
        Perbarui informasi gedung kampus
    </p>

</div>

<!-- FORM -->
<div class="form-card">

    <form method="POST"
          action="{{ route('gedung.update', $gedung->id) }}">

        @csrf
        @method('PUT')

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
                        {{ old('fakultas_id', $gedung->fakultas_id) == $f->id ? 'selected' : '' }}>

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
                   value="{{ old('nama_gedung', $gedung->nama_gedung) }}"
                   class="form-control @error('nama_gedung') is-invalid @enderror"
                   placeholder="Masukkan nama gedung">

            @error('nama_gedung')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <!-- BUTTON -->
        <div class="action-group">

            <button type="submit"
                    class="btn-update">

                Update Gedung

            </button>

            <a href="{{ route('gedung.index') }}"
               class="btn-back">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection