<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Gedung;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - LIST KELAS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $kelas = Kelas::with('gedung')->latest()->get();

        return view('admin.kelas.index', compact('kelas'));
    }

    /*
    |--------------------------------------------------------------------------
    | USER - LIST KELAS
    |--------------------------------------------------------------------------
    */

    public function userIndex()
    {
        $kelas = Kelas::with('gedung.fakultas')
            ->latest()
            ->get();

        return view('user.kelas.index', compact('kelas'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - FORM CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $gedung = Gedung::all();

        return view('admin.kelas.create', compact('gedung'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'gedung_id' => 'required',
            'nama_kelas' => 'required',
            'keterangan' => 'nullable'
        ]);

        Kelas::create([
            'gedung_id' => $request->gedung_id,
            'nama_kelas' => $request->nama_kelas,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Kelas $kela)
    {
        $gedung = Gedung::all();

        return view('admin.kelas.edit', [
            'kelas' => $kela,
            'gedung' => $gedung
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'gedung_id' => 'required',
            'nama_kelas' => 'required',
            'keterangan' => 'nullable'
        ]);

        $kela->update([
            'gedung_id' => $request->gedung_id,
            'nama_kelas' => $request->nama_kelas,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus');
    }
}