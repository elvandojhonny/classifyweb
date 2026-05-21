@extends('layouts.admin')

@section('navbar','Tambah Kelas')

@section('content')

<div class="card-modern">

    <h5 class="mb-4">Tambah Kelas</h5>

    <form method="POST" action="{{ route('kelas.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Gedung</label>
            <select name="gedung_id"
                    class="form-control @error('gedung_id') is-invalid @enderror">

                <option value="">-- Pilih Gedung --</option>

                @foreach($gedung as $g)
                    <option value="{{ $g->id }}">
                        {{ $g->nama_gedung }}
                    </option>
                @endforeach

            </select>

            @error('gedung_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas"
                   class="form-control @error('nama_kelas') is-invalid @enderror"
                   placeholder="Contoh: Lab Komputer 1">

            @error('nama_kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan"
                      class="form-control @error('keterangan') is-invalid @enderror"
                      rows="3"
                      placeholder="Contoh: Kapasitas 40 orang"></textarea>

            @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>

</div>

@endsection