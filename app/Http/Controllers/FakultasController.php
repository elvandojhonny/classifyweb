<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::latest()->get();

        return view('admin.fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('admin.fakultas.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_fakultas' => 'required|string|max:100'
    ], [
        'nama_fakultas.required' => 'Nama fakultas wajib diisi'
    ]);

    Fakultas::create([
        'nama_fakultas' => $request->nama_fakultas
    ]);

    return redirect()
        ->route('fakultas.index')
        ->with('success', 'Fakultas berhasil ditambahkan');
}

    public function edit($id)
    {
        $fakultas = Fakultas::findOrFail($id);

        return view('admin.fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_fakultas' => 'required|string|max:100'
    ]);

    $fakultas = Fakultas::findOrFail($id);

    $fakultas->update([
        'nama_fakultas' => $request->nama_fakultas
    ]);

    return redirect()
        ->route('fakultas.index')
        ->with('success', 'Fakultas berhasil diupdate');
}
    public function destroy($id)
    {
        Fakultas::destroy($id);

        return back()->with('success', 'Fakultas berhasil dihapus');
    }
}