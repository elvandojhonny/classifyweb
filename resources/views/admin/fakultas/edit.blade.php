@extends('layouts.admin')

@section('navbar','Edit Fakultas')

@section('content')

<div class="card-modern">

    <h5 class="mb-4">Edit Fakultas</h5>

    <form method="POST" action="{{ route('fakultas.update', $fakultas->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Fakultas</label>

            <input type="text"
                   name="nama_fakultas"
                   value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}"
                   class="form-control @error('nama_fakultas') is-invalid @enderror">

            @error('nama_fakultas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>

</div>

@endsection