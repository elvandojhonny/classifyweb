@extends('layouts.admin')

@section('navbar','Edit Pengumuman')

@section('content')

<div class="card-modern">

    <h4 class="fw-bold mb-4">
        Edit Pengumuman
    </h4>

    <form action="{{ route('pengumuman.update',$pengumuman->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Judul
            </label>

            <input type="text"
                   name="judul"
                   value="{{ $pengumuman->judul }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label class="form-label">
                Isi Pengumuman
            </label>

            <textarea name="isi"
                      rows="5"
                      class="form-control">{{ $pengumuman->isi }}</textarea>

        </div>

        <div class="form-check mb-4">

            <input class="form-check-input"
                   type="checkbox"
                   name="aktif"
                   value="1"
                   {{ $pengumuman->aktif ? 'checked' : '' }}>

            <label class="form-check-label">

                Aktifkan Pengumuman

            </label>

        </div>

        <button class="btn btn-primary">

            Update Pengumuman

        </button>

    </form>

</div>

@endsection