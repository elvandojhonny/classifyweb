<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index()
    {
    $gedung = Gedung::with('fakultas')
        ->where(
            'fakultas_id',
            auth()->user()->fakultas_id
        )
        ->latest()
        ->get();

    return view('admin.gedung.index', compact('gedung'));
    }

    public function create()
    {
        $fakultas = Fakultas::where(
    'id',
    auth()->user()->fakultas_id
)->get();

        return view('admin.gedung.create', compact('fakultas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'fakultas_id' => 'required|exists:fakultas,id',
        'nama_gedung' => 'required|string|max:100'
    ]);

    Gedung::create([
    'fakultas_id' => auth()->user()->fakultas_id,
    'nama_gedung' => $request->nama_gedung
]);

    return redirect()
        ->route('gedung.index')
        ->with('success', 'Gedung berhasil ditambahkan');
}

    public function edit($id)
    {
        $gedung = Gedung::where(
    'fakultas_id',
    auth()->user()->fakultas_id
)->findOrFail($id);

        $fakultas = Fakultas::all();

        return view('admin.gedung.edit', compact(
            'gedung',
            'fakultas'
        ));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'fakultas_id' => 'required|exists:fakultas,id',
        'nama_gedung' => 'required|string|max:100'
    ]);

    $gedung = Gedung::findOrFail($id);

    if (
    $gedung->fakultas_id != auth()->user()->fakultas_id
){
    abort(403);
}

    $gedung->update([
        'fakultas_id' => $request->fakultas_id,
        'nama_gedung' => $request->nama_gedung
    ]);

    return redirect()
        ->route('gedung.index')
        ->with('success', 'Gedung berhasil diupdate');
}

    public function destroy($id)
{
    $gedung = Gedung::where(
        'fakultas_id',
        auth()->user()->fakultas_id
    )->findOrFail($id);

    $gedung->delete();

    return back()->with(
        'success',
        'Gedung berhasil dihapus'
    );
}
}