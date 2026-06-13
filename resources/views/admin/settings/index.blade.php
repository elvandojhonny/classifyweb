@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('page-title', 'Pengaturan')

@section('content')

<style>

    .settings-title{
    font-size:22px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:4px;
}

.settings-subtitle{
    color:#64748b;
    font-size:14px;
    margin-bottom:28px;
}

.setting-card{
    background:white;
    border-radius:22px;
    padding:22px;
    border:1px solid rgba(0,0,0,.05);
    box-shadow:0 4px 14px rgba(0,0,0,.05);
    height:100%;
}

.card-section-title{
    font-size:16px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:18px;
}

.form-label{
    font-size:13px;
    font-weight:600;
    color:#475569;
    margin-bottom:8px;
}

.form-control,
.form-select{
    border-radius:14px;
    border:1px solid #e2e8f0;
    min-height:48px;
    font-size:14px;
}

.form-control:focus,
.form-select:focus{
    border-color:#4f46e5;
    box-shadow:none;
}

textarea.form-control{
    min-height:110px;
}

.btn-save{
    width:100%;
    background:#4f46e5;
    color:white;
    border:none;
    border-radius:16px;
    padding:14px;
    font-weight:600;
    margin-top:24px;
}

.btn-save:hover{
    background:#4338ca;
}

@media(max-width:768px){

    .setting-card{
        padding:16px;
        border-radius:18px;
    }

    .settings-title{
        font-size:18px;
    }

    .settings-subtitle{
        font-size:13px;
    }

    .card-section-title{
        font-size:15px;
    }
}

</style>

<div class="mb-4">

    <div class="settings-title">
        Pengaturan Sistem
    </div>

    <div class="settings-subtitle">
        Kelola konfigurasi aplikasi kampus
    </div>

</div>

<form action="{{ route('settings.update') }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="row g-4">

        <!-- INFORMASI SISTEM -->
        <div class="col-lg-6">

            <div class="setting-card">

                <div class="card-section-title">
                    Informasi Sistem
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Sistem</label>
                    <input type="text"
                           name="system_name"
                           value="{{ $setting->system_name }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Sistem</label>
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

                <div class="mb-3">
                    <label class="form-label">Jam Operasional</label>
                    <input type="text"
                           name="operational_hours"
                           value="{{ $setting->operational_hours }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Support</label>
                    <input type="text"
                           name="support_email"
                           value="{{ $setting->support_email }}"
                           class="form-control">
                </div>

                <div>
                    <label class="form-label">Nomor Support</label>
                    <input type="text"
                           name="support_phone"
                           value="{{ $setting->support_phone }}"
                           class="form-control">
                </div>

            </div>

        </div>

        <!-- LANDING PAGE -->
        <div class="col-lg-6">

            <div class="setting-card">

                <div class="card-section-title">
                    Landing Page & Welcome
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Running Text
                    </label>

                    <textarea name="running_text"
                              class="form-control">{{ $setting->running_text }}</textarea>
                </div>

                <div>
                    <label class="form-label">
                        Deskripsi Welcome
                    </label>

                    <textarea name="welcome_description"
                              class="form-control">{{ $setting->welcome_description }}</textarea>
                </div>

            </div>

        </div>

        <!-- LOKASI -->
        <div class="col-12">

            <div class="setting-card">

                <div class="card-section-title">
                    Lokasi Kampus
                </div>

                <div class="row">

                    <div class="col-lg-6 mb-3">
                        <label class="form-label">
                            Alamat Kampus
                        </label>

                        <textarea name="campus_address"
                                  class="form-control">{{ $setting->campus_address }}</textarea>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="form-label">
                            Link Google Maps
                        </label>

                        <input type="text"
                               name="maps_link"
                               value="{{ $setting->maps_link }}"
                               class="form-control">
                    </div>

                    <div class="col-12">
                        <label class="form-label">
                            Embed Google Maps
                        </label>

                        <textarea name="maps_embed"
                                  class="form-control">{{ $setting->maps_embed }}</textarea>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <button class="btn-save">
        Simpan Pengaturan
    </button>

</form>

@endsection