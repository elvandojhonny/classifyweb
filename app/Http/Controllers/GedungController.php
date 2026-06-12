<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST GEDUNG
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (auth()->user()->role == 'superadmin') {

            $gedung = Gedung::with('fakultas')
                ->latest()
                ->get();

        } else {

            $gedung = Gedung::with('fakultas')
                ->where(
                    'fakultas_id',
                    auth()->user()->fakultas_id
                )
                ->latest()
                ->get();
        }

        return view('admin.gedung.index', compact('gedung'));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        if (auth()->user()->role == 'superadmin') {

            $fakultas = Fakultas::all();

        } else {

            $fakultas = Fakultas::where(
                'id',
                auth()->user()->fakultas_id
            )->get();
        }

        return view('admin.gedung.create', compact('fakultas'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'fakultas_id' => 'required|exists:fakultas,id',
            'nama_gedung' => 'required|string|max:100'
        ]);

        if (auth()->user()->role == 'superadmin') {

            $fakultasId = $request->fakultas_id;

        } else {

            $fakultasId = auth()->user()->fakultas_id;
        }

        Gedung::create([
            'fakultas_id' => $fakultasId,
            'nama_gedung' => $request->nama_gedung
        ]);

        return redirect()
            ->route('gedung.index')
            ->with('success', 'Gedung berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $gedung = Gedung::findOrFail($id);

        if (
            auth()->user()->role != 'superadmin'
            &&
            $gedung->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        if (auth()->user()->role == 'superadmin') {

            $fakultas = Fakultas::all();

        } else {

            $fakultas = Fakultas::where(
                'id',
                auth()->user()->fakultas_id
            )->get();
        }

        return view(
            'admin.gedung.edit',
            compact('gedung', 'fakultas')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([
            'fakultas_id' => 'required|exists:fakultas,id',
            'nama_gedung' => 'required|string|max:100'
        ]);

        $gedung = Gedung::findOrFail($id);

        if (
            auth()->user()->role != 'superadmin'
            &&
            $gedung->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        if (auth()->user()->role == 'superadmin') {

            $fakultasId = $request->fakultas_id;

        } else {

            $fakultasId = auth()->user()->fakultas_id;
        }

        $gedung->update([
            'fakultas_id' => $fakultasId,
            'nama_gedung' => $request->nama_gedung
        ]);

        return redirect()
            ->route('gedung.index')
            ->with('success', 'Gedung berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $gedung = Gedung::findOrFail($id);

        if (
            auth()->user()->role != 'superadmin'
            &&
            $gedung->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        $gedung->delete();

        return back()->with(
            'success',
            'Gedung berhasil dihapus'
        );
    }
}