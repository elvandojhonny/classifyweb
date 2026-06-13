@extends('layouts.admin')

@section('title','Edit Pengumuman')
@section('page-title','Edit Pengumuman')

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

    .form-control{
        border-radius:14px;
        border:1px solid #e2e8f0;
        padding:12px 14px;
        font-size:14px;
        box-shadow:none !important;
        transition:.3s;
    }

    .form-control:focus{
        border-color:#4f46e5;
    }

    textarea.form-control{
        min-height:180px;
        resize:none;
    }

    .form-check{
        background:#f8fafc;
        border:1px solid #e2e8f0;
        border-radius:14px;
        padding:14px 16px;
        display:flex;
        align-items:center;
        gap:10px;
    }

    .form-check-input{
        margin-top:0;
        width:18px;
        height:18px;
    }

    .form-check-label{
        font-size:14px;
        font-weight:500;
        color:#334155;
        cursor:pointer;
    }

    .btn-save{
        background:#4f46e5;
        color:white;
        border:none;
        border-radius:14px;
        padding:11px 20px;
        font-size:14px;
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
        border-radius:14px;
        padding:11px 20px;
        font-size:14px;
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

        .form-control{
            font-size:13px;
        }

        .form-check-label{
            font-size:13px;
        }

        .action-buttons{
            flex-direction:column;
        }

        .btn-save,
        .btn-back{
            width:100%;
            text-align:center;
        }

    }

</style>

<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="form-card">

            <div class="form-title">
                Edit Pengumuman
            </div>

            <div class="form-subtitle">
                Perbarui informasi pengumuman yang akan ditampilkan kepada pengguna sistem
            </div>

            <form action="{{ route('pengumuman.update',$pengumuman->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Judul Pengumuman
                    </label>

                    <input type="text"
                           name="judul"
                           value="{{ old('judul',$pengumuman->judul) }}"
                           class="form-control"
                           placeholder="Masukkan judul pengumuman"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Isi Pengumuman
                    </label>

                    <textarea name="isi"
                              class="form-control"
                              placeholder="Tulis isi pengumuman..."
                              required>{{ old('isi',$pengumuman->isi) }}</textarea>

                </div>

                <div class="mb-4">

                    <div class="form-check">

                        <input class="form-check-input"
                               type="checkbox"
                               id="aktif"
                               name="aktif"
                               value="1"
                               {{ $pengumuman->aktif ? 'checked' : '' }}>

                        <label class="form-check-label" for="aktif">

                            Aktifkan Pengumuman

                        </label>

                    </div>

                </div>

                <div class="d-flex gap-2 action-buttons">

                    <button type="submit"
                            class="btn-save">

                        <i class="bi bi-check-lg me-1"></i>
                        Update Pengumuman

                    </button>

                    <a href="{{ route('pengumuman.index') }}"
                       class="btn-back">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection