@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('page-title', 'Pengaturan')

@section('content')

<style>

    .settings-card{
        background: white;
        border-radius: 30px;
        padding: 35px;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .settings-title{
        font-size: 30px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .settings-subtitle{
        color: #64748b;
        margin-bottom: 35px;
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
        border-color: #4f46e5;
        box-shadow: none;
    }

    .section-title{
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 20px;
        margin-top: 10px;
    }

    .btn-save{
        background: #4f46e5;
        color: white;
        border: none;
        border-radius: 18px;
        padding: 15px 28px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-save:hover{
        background: #4338ca;
        transform: translateY(-2px);
    }

</style>

<div class="settings-card">

    <!-- HEADER -->
    <div class="mb-4">

        <div class="settings-title">

            Pengaturan Sistem

        </div>

        <div class="settings-subtitle">

            Kelola informasi aplikasi kampus secara realtime

        </div>

    </div>

    <!-- FORM -->
    <form action="{{ route('settings.update') }}"
          method="POST">

        @csrf
        @method('PUT')

        <!-- =========================
            INFORMASI SISTEM
        ========================== -->

        <div class="section-title">

            Informasi Sistem

        </div>

        <div class="row">

            <!-- NAMA -->
            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Nama Sistem

                </label>

                <input type="text"
                       name="system_name"
                       value="{{ $setting->system_name }}"
                       class="form-control">

            </div>

            <!-- STATUS -->
            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Status Sistem

                </label>

                <select name="system_status"
                        class="form-select">

                    <option value="ONLINE"
                        {{ $setting->system_status == 'ONLINE' ? 'selected' : '' }}>

                        ONLINE

                    </option>

                    <option value="MAINTENANCE"
                        {{ $setting->system_status == 'MAINTENANCE' ? 'selected' : '' }}>

                        MAINTENANCE

                    </option>

                    <option value="GANGGUAN"
                        {{ $setting->system_status == 'GANGGUAN' ? 'selected' : '' }}>

                        GANGGUAN

                    </option>

                </select>

            </div>

            <!-- JAM -->
            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Jam Operasional

                </label>

                <input type="text"
                       name="operational_hours"
                       value="{{ $setting->operational_hours }}"
                       class="form-control">

            </div>

            <!-- EMAIL -->
            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Email Support

                </label>

                <input type="text"
                       name="support_email"
                       value="{{ $setting->support_email }}"
                       class="form-control">

            </div>

            <!-- PHONE -->
            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Nomor Support

                </label>

                <input type="text"
                       name="support_phone"
                       value="{{ $setting->support_phone }}"
                       class="form-control">

            </div>

        </div>

        <!-- =========================
            WELCOME
        ========================== -->

        <div class="section-title">

            Landing Page & Welcome

        </div>

        <div class="row">

            <!-- RUNNING TEXT -->
            <div class="col-md-12 mb-4">

                <label class="form-label">

                    Running Text

                </label>

                <textarea name="running_text"
                          class="form-control">{{ $setting->running_text }}</textarea>

            </div>

            <!-- DESKRIPSI -->
            <div class="col-md-12 mb-4">

                <label class="form-label">

                    Deskripsi Welcome

                </label>

                <textarea name="welcome_description"
                          class="form-control">{{ $setting->welcome_description }}</textarea>

            </div>

        </div>

        <!-- =========================
            LOKASI KAMPUS
        ========================== -->

        <div class="section-title">

            Lokasi Kampus

        </div>

        <div class="row">

            <!-- ALAMAT -->
            <div class="col-md-12 mb-4">

                <label class="form-label">

                    Alamat Kampus

                </label>

                <textarea name="campus_address"
                          class="form-control">{{ $setting->campus_address }}</textarea>

            </div>

            <!-- LINK MAPS -->
            <div class="col-md-12 mb-4">

                <label class="form-label">

                    Link Google Maps

                </label>

                <input type="text"
                       name="maps_link"
                       value="{{ $setting->maps_link }}"
                       class="form-control">

            </div>

            <!-- EMBED -->
            <div class="col-md-12 mb-4">

                <label class="form-label">

                    Embed Google Maps

                </label>

                <textarea name="maps_embed"
                          class="form-control">{{ $setting->maps_embed }}</textarea>

            </div>

        </div>

        <!-- BUTTON -->
        <button class="btn-save">

            Simpan Pengaturan

        </button>

    </form>

</div>

@endsection