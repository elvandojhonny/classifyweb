@extends('layouts.admin')

@section('title','Tambah Kelas')
@section('navbar','Tambah Kelas')

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
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 14px 18px;
        transition: 0.3s;
    }

    .form-control{
        height: 56px;
    }

    textarea.form-control{
        min-height: 120px;
        resize: none;
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
            Tambah Kelas
        </div>

        <div class="form-subtitle">
            Tambahkan data ruang kelas baru ke dalam sistem
        </div>

    </div>

    <!-- FORM -->
    <form method="POST"
          action="{{ route('kelas.store') }}">

        @csrf

        <!-- GEDUNG -->
        <div class="mb-4">

            <label class="form-label">

                Gedung

            </label>

            <select name="gedung_id"
                    class="form-select @error('gedung_id') is-invalid @enderror">

                @foreach($gedung as $g)

    <option value="{{ $g->id }}"
        {{ old('gedung_id') == $g->id ? 'selected' : '' }}>

        {{ $g->nama_gedung }}
        @if($g->fakultas)
            - {{ $g->fakultas->nama_fakultas }}
        @endif

    </option>

@endforeach

            </select>

            @error('gedung_id')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <!-- NAMA KELAS -->
        <div class="mb-4">

            <label class="form-label">

                Ruang Kelas

            </label>

            <input type="text"
                   name="ruang_kelas"
                   value="{{ old('ruang_kelas') }}"
                   class="form-control @error('ruang_kelas') is-invalid @enderror"
                   placeholder="Contoh: Lantai 1, Ruang 101">

            @error('ruang_kelas')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <!-- KETERANGAN -->
        <div class="mb-4">

            <label class="form-label">

                Keterangan

            </label>

            <textarea name="keterangan"
                      class="form-control @error('keterangan') is-invalid @enderror"
                      placeholder="Contoh: Kapasitas 100, AC, WIFI & Proyektor">{{ old('keterangan') }}</textarea>

            @error('keterangan')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-3">

            <button class="btn-modern btn-primary-modern">

                Simpan Kelas

            </button>

            <a href="{{ route('kelas.index') }}"
               class="btn-modern btn-secondary-modern">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection