@extends('layouts.user')

@section('page-title', 'Ajukan Peminjaman')

@section('content')

<style>

.section-header{
    margin-bottom:24px;
}

.section-header h4{
    font-weight:700;
    color:#0f172a;
    margin-bottom:4px;
}

.section-header p{
    color:#64748b;
    margin:0;
}

/* CARD */

.form-card{
    background:white;
    border-radius:24px;
    padding:24px;
    border:1px solid rgba(0,0,0,.04);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
}

.kelas-info{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:18px;
    padding:18px;
    margin-bottom:24px;
}

.kelas-header{
    display:flex;
    align-items:center;
    gap:14px;
}

.kelas-icon{
    width:56px;
    height:56px;
    border-radius:16px;
    background:rgba(79,70,229,.12);
    color:#4f46e5;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    flex-shrink:0;
}

.kelas-title{
    font-size:18px;
    font-weight:700;
    color:#0f172a;
}

.kelas-subtitle{
    color:#64748b;
    font-size:13px;
}

/* FORM */

.form-label{
    font-weight:600;
    color:#334155;
    margin-bottom:8px;
}

.form-control{
    border-radius:14px;
    min-height:48px;
    border:1px solid #dbeafe;
    box-shadow:none !important;
}

.form-control:focus{
    border-color:#4f46e5;
}

textarea.form-control{
    min-height:130px;
}

/* BUTTON */

.submit-btn{
    width:100%;
    border:none;
    border-radius:14px;
    padding:14px;
    background:#4f46e5;
    color:white;
    font-weight:600;
    transition:.3s;
}

.submit-btn:hover{
    background:#4338ca;
}

/* ALERT */

.success-alert{
    background:rgba(34,197,94,.12);
    color:#16a34a;
    padding:14px 18px;
    border-radius:14px;
    margin-bottom:20px;
}

.error-alert{
    background:rgba(239,68,68,.12);
    color:#dc2626;
    padding:14px 18px;
    border-radius:14px;
    margin-bottom:20px;
}

/* MOBILE */

@media(max-width:768px){

    .form-card{
        padding:16px;
        border-radius:18px;
    }

    .kelas-info{
        padding:14px;
        border-radius:14px;
    }

    .kelas-icon{
        width:44px;
        height:44px;
        font-size:18px;
        border-radius:12px;
    }

    .kelas-title{
        font-size:15px;
    }

    .kelas-subtitle{
        font-size:11px;
    }

    .section-header h4{
        font-size:20px;
    }

    .section-header p{
        font-size:13px;
    }

    .submit-btn{
        padding:12px;
        font-size:14px;
    }
}

</style>

<!-- HEADER -->

<div class="section-header">

    <h4>Ajukan Peminjaman</h4>

    <p>
        Isi data peminjaman ruangan dengan lengkap
    </p>

</div>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="form-card">

            <!-- INFO KELAS -->

            <div class="kelas-info">

                <div class="kelas-header">

                    <div class="kelas-icon">
                        <i class="bi bi-door-open"></i>
                    </div>

                    <div>

                        <div class="kelas-title">
                            {{ $kelas->nama_kelas }}
                        </div>

                        <div class="kelas-subtitle">

                            {{ $kelas->gedung->nama_gedung }}
                            •
                            {{ $kelas->gedung->fakultas->nama_fakultas }}

                        </div>

                    </div>

                </div>

            </div>

            <!-- ALERT -->

            <!-- ALERT -->

            @if(session('success'))

                <div class="success-alert">
                    {{ session('success') }}
                </div>

            @endif

            @if(session('error'))

                <div class="error-alert">
                    {{ session('error') }}
                </div>

            @endif

            @if($errors->any())

                <div class="error-alert">
                    {{ $errors->first() }}
                </div>

            @endif

            <!-- FORM -->

            <form action="{{ route('peminjaman.store') }}"
                  method="POST">

                @csrf

                <input type="hidden"
                       name="kelas_id"
                       value="{{ $kelas->id }}">

                <div class="mb-4">

                    <label class="form-label">
                        Tanggal Peminjaman
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           required>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Jam Mulai
                        </label>

                        <input type="time"
                               name="jam_mulai"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Jam Selesai
                        </label>

                        <input type="time"
                               name="jam_selesai"
                               class="form-control"
                               required>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Keperluan
                    </label>

                    <textarea name="keperluan"
                              class="form-control"
                              placeholder="Contoh: Perkuliahan, Seminar, Rapat, Praktikum, dan lain-lain"
                              required></textarea>

                </div>

                <button type="submit"
                        class="submit-btn">

                    <i class="bi bi-send me-2"></i>
                    Kirim Pengajuan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection