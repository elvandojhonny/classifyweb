@extends('layouts.admin')

@section('navbar','Edit User')

@section('content')

<div class="card-modern">

    <h5 class="mb-4">Edit Data User</h5>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="row">

            <!-- NAMA -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       class="form-control @error('name') is-invalid @enderror">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Email (Username)</label>
                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="form-control @error('email') is-invalid @enderror">

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Password (Opsional)</label>
                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengubah password
                </small>

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- NIM -->
            <div class="col-md-6 mb-3">
                <label class="form-label">NIM</label>
                <input type="text"
                       name="nim"
                       value="{{ old('nim', $user->nim) }}"
                       class="form-control @error('nim') is-invalid @enderror">

                @error('nim')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PRODI -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Prodi</label>
                <input type="text"
                       name="prodi"
                       value="{{ old('prodi', $user->prodi) }}"
                       class="form-control @error('prodi') is-invalid @enderror">

                @error('prodi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- ROLE -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Role</label>
                <select name="role"
                        class="form-control @error('role') is-invalid @enderror">

                    <option value="user"
                        {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                        User
                    </option>

                    <option value="admin"
                        {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                </select>

                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>

</div>

@endsection