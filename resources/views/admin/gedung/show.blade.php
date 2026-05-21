<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gedung</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 min-h-screen text-white p-10">

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-10">

        <div>

            <h1 class="text-5xl font-bold">
                {{ $fakultas->nama_fakultas }}
            </h1>

            <p class="text-slate-300 mt-3">
                Daftar gedung dalam fakultas.
            </p>

        </div>

        <a href="{{ route('gedung.create', ['fakultas' => $fakultas->id]) }}"
   class="btn btn-primary rounded-3">

    + Tambah Gedung

</a>

    </div>

    @if(session('success'))

        <div class="bg-green-500/20 border border-green-500 p-4 rounded-2xl mb-6 text-green-300">

            {{ session('success') }}

        </div>

    @endif

    <div class="grid md:grid-cols-3 gap-6">

        @forelse($gedungs as $item)

        <div class="bg-white/10 border border-white/10 backdrop-blur-xl p-8 rounded-3xl shadow-2xl">

            <h2 class="text-2xl font-bold mb-5">

                {{ $item->nama_gedung }}

            </h2>

            <div class="flex gap-3">

                <a href="{{ route('gedung.edit', $item->id) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-xl">

                    Edit

                </a>

                <form action="{{ route('gedung.destroy', $item->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Hapus gedung?')"
                            class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-xl">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

        @empty

        <div class="bg-white/10 border border-white/10 p-10 rounded-3xl">

            Belum ada gedung.

        </div>

        @endforelse

    </div>

</div>

</body>
</html>