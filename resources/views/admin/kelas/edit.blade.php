@extends('layouts.admin')

@section('navbar','Edit Kelas')

@section('content')

<div class="card-modern">

    <h5 class="mb-4">Edit Kelas</h5>

    <form method="POST" action="{{ route('kelas.update', $kelas->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Gedung</label>

            <select name="gedung_id"
                    class="form-control @error('gedung_id') is-invalid @enderror">

                @foreach($gedung as $g)
                    <option value="{{ $g->id }}"
                        {{ $g->id == old('gedung_id', $kelas->gedung_id) ? 'selected' : '' }}>
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

            <input type="text"
                   name="nama_kelas"
                   value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                   class="form-control @error('nama_kelas') is-invalid @enderror">

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
                      rows="3">{{ old('keterangan', $kelas->keterangan) }}</textarea>

            @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>

</div>

@endsection