@extends('layouts.admin')

@section('navbar','Pengumuman')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h4 class="fw-bold mb-1">
            Pengumuman Sistem
        </h4>

        <small class="text-muted">
            Kelola informasi untuk dashboard user
        </small>

    </div>

    <a href="{{ route('pengumuman.create') }}"
       class="btn btn-primary">

        + Tambah Pengumuman

    </a>

</div>

<div class="row">

    @forelse($pengumuman as $item)

        <div class="col-md-6 mb-4">

            <div class="card-modern">

                <div class="d-flex justify-content-between align-items-start mb-3">

                    <div>

                        <h5 class="fw-bold mb-1">
                            {{ $item->judul }}
                        </h5>

                        <small class="text-muted">
                            {{ $item->created_at->format('d M Y') }}
                        </small>

                    </div>

                    @if($item->aktif)

                        <span class="badge bg-success">
                            Aktif
                        </span>

                    @else

                        <span class="badge bg-secondary">
                            Nonaktif
                        </span>

                    @endif

                </div>

                <p class="text-muted">

                    {{ $item->isi }}

                </p>

                <div class="d-flex gap-2 mt-3">

                    <a href="{{ route('pengumuman.edit',$item->id) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('pengumuman.destroy',$item->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus pengumuman?')">

                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="card-modern text-center text-muted py-5">

                Belum ada pengumuman

            </div>

        </div>

    @endforelse

</div>

@endsection