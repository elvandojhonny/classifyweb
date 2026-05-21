@extends('layouts.admin')

@section('navbar','Tambah Gedung')

@section('content')

<div class="card-modern">

    <h5 class="mb-4">Tambah Gedung</h5>

    <form method="POST" action="{{ route('gedung.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <select name="fakultas_id"
                    class="form-control @error('fakultas_id') is-invalid @enderror">

                <option value="">-- Pilih Fakultas --</option>

                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}">
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

        <div class="mb-3">
            <label class="form-label">Nama Gedung</label>
            <input type="text" name="nama_gedung"
                   class="form-control @error('nama_gedung') is-invalid @enderror"
                   placeholder="Contoh: Gedung A">

            @error('nama_gedung')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('gedung.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>

</div>

@endsection