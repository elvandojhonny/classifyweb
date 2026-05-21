@extends('layouts.admin')

@section('title', 'Tambah User')

@section('page-title', 'Tambah User')

@section('content')

<style>

    .form-card{
        background: white;
        border-radius: 24px;
        padding: 32px;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
    }

    .form-header{
        margin-bottom: 28px;
    }

    .form-header h4{
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 4px;
    }

    .form-header p{
        color: #64748b;
        margin: 0;
    }

    .form-label{
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select{
        border-radius: 14px;
        padding: 12px 16px;
        border: 1px solid #e2e8f0;
        box-shadow: none !important;
        transition: 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus{
        border-color: #4f46e5;
    }

    .submit-btn{
        background: #4f46e5;
        color: white;
        border: none;
        padding: 13px 24px;
        border-radius: 14px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .submit-btn:hover{
        background: #4338ca;
    }

</style>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="form-card">

            <!-- HEADER -->
            <div class="form-header">

                <h4>Tambah User</h4>

                <p>
                    Tambahkan akun pengguna baru ke dalam sistem
                </p>

            </div>

            <!-- FORM -->
            <form method="POST"
                  action="{{ route('users.store') }}">

                @csrf

                <div class="row">

                    <!-- NAMA -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Masukkan nama lengkap"
                               required>

                    </div>

                    <!-- EMAIL -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Masukkan email"
                               required>

                    </div>

                    <!-- PASSWORD -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Masukkan password"
                               required>

                    </div>

                    <!-- NIM -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            NIM
                        </label>

                        <input type="text"
                               name="nim"
                               class="form-control"
                               placeholder="Masukkan NIM"
                               required>

                    </div>

                    <!-- PRODI -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Program Studi
                        </label>

                        <input type="text"
                               name="prodi"
                               class="form-control"
                               placeholder="Masukkan program studi"
                               required>

                    </div>

                    <!-- ROLE -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Role User
                        </label>

                        <select name="role"
                                class="form-select"
                                required>

                            <option value="">
                                -- Pilih Role --
                            </option>

                            <option value="user">
                                User
                            </option>

                            <option value="admin">
                                Admin
                            </option>

                        </select>

                    </div>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="submit-btn">

                    Simpan User

                </button>

            </form>

        </div>

    </div>

</div>

@endsection