@extends('layouts.admin')

@section('navbar','Tambah Pengumuman')

@section('content')

<div class="card-modern">

    <h4 class="fw-bold mb-4">
        Tambah Pengumuman
    </h4>

    <form action="{{ route('pengumuman.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Judul
            </label>

            <input type="text"
                   name="judul"
                   class="form-control">

        </div>

        <div class="mb-4">

            <label class="form-label">
                Isi Pengumuman
            </label>

            <textarea name="isi"
                      rows="5"
                      class="form-control"></textarea>

        </div>

        <button class="btn btn-primary">

            Simpan Pengumuman

        </button>

    </form>

</div>

@endsection