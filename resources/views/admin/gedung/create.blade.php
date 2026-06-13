@extends('layouts.admin')

@section('title','Tambah Gedung')
@section('page-title','Tambah Gedung')

@section('content')

<style>

    .form-card{
        background:#fff;
        border-radius:24px;
        padding:32px;
        border:1px solid rgba(0,0,0,.05);
        box-shadow:0 10px 30px rgba(0,0,0,.05);
    }

    .form-header{
        margin-bottom:28px;
    }

    .form-header h4{
        font-size:28px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:6px;
    }

    .form-header p{
        color:#64748b;
        margin:0;
    }

    .form-label{
        font-weight:600;
        color:#334155;
        margin-bottom:8px;
    }

    .form-control,
    .form-select{
        border-radius:14px;
        border:1px solid #e2e8f0;
        padding:12px 16px;
        min-height:54px;
        box-shadow:none !important;
        transition:.3s;
    }

    .form-control:focus,
    .form-select:focus{
        border-color:#4f46e5;
    }

    .btn-save{
        background:#4f46e5;
        color:white;
        border:none;
        padding:13px 24px;
        border-radius:14px;
        font-weight:600;
        transition:.3s;
    }

    .btn-save:hover{
        background:#4338ca;
        color:white;
    }

    .btn-back{
        background:#f1f5f9;
        color:#334155;
        border:none;
        padding:13px 24px;
        border-radius:14px;
        font-weight:600;
        text-decoration:none;
        transition:.3s;
    }

    .btn-back:hover{
        background:#e2e8f0;
        color:#0f172a;
    }

    @media(max-width:768px){

        .form-card{
            padding:18px;
            border-radius:20px;
        }

        .form-header h4{
            font-size:22px;
        }

        .form-header p{
            font-size:13px;
        }

        .form-control,
        .form-select{
            font-size:14px;
        }

        .btn-save,
        .btn-back{
            width:100%;
            text-align:center;
        }

        .action-wrap{
            flex-direction:column;
        }

    }

</style>

<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="form-card">

            <div class="form-header">

                <h4>Tambah Gedung</h4>

                <p>
                    Tambahkan data gedung baru ke dalam sistem
                </p>

            </div>

            <form method="POST"
                  action="{{ route('gedung.store') }}">

                @csrf

                <div class="mb-4">

                    <label class="form-label">
                        Fakultas
                    </label>

                    <select name="fakultas_id"
                            class="form-select @error('fakultas_id') is-invalid @enderror"
                            required>

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

                <div class="mb-4">

                    <label class="form-label">
                        Nama Gedung
                    </label>

                    <input type="text"
                           name="nama_gedung"
                           value="{{ old('nama_gedung') }}"
                           class="form-control @error('nama_gedung') is-invalid @enderror"
                           placeholder="Contoh: Gedung A"
                           required>

                    @error('nama_gedung')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-flex gap-3 action-wrap">

                    <button type="submit"
                            class="btn-save">

                        Simpan Gedung

                    </button>

                    <a href="{{ route('gedung.index') }}"
                       class="btn-back">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection