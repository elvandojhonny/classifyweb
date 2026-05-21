@extends('layouts.admin')

@section('navbar','Tambah Fakultas')

@section('content')

<div class="card-modern">

    <h5 class="mb-4">Tambah Fakultas</h5>

    <form method="POST" action="{{ route('fakultas.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Fakultas</label>
            <input type="text" name="nama_fakultas"
                   class="form-control @error('nama_fakultas') is-invalid @enderror"
                   placeholder="Contoh: Fakultas Teknik">

            @error('nama_fakultas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>

</div>

@endsection