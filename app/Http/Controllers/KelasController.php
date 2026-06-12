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
        if (auth()->user()->role == 'superadmin') {

            $kelas = Kelas::with('gedung.fakultas')
                ->latest()
                ->get();

        } else {

            $kelas = Kelas::with('gedung.fakultas')

                ->whereHas('gedung', function ($q) {

                    $q->where(
                        'fakultas_id',
                        auth()->user()->fakultas_id
                    );

                })

                ->latest()
                ->get();
        }

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

            ->whereHas('gedung', function ($q) {

                $q->where(
                    'fakultas_id',
                    auth()->user()->fakultas_id
                );

            })

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
    if (auth()->user()->role == 'superadmin') {

        $gedung = Gedung::with('fakultas')->get();

    } else {

        $gedung = Gedung::with('fakultas')
            ->where(
                'fakultas_id',
                auth()->user()->fakultas_id
            )
            ->get();
    }

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

        $gedung = Gedung::findOrFail(
            $request->gedung_id
        );

        if (
            auth()->user()->role != 'superadmin'
            &&
            $gedung->fakultas_id != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

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
        if (
            auth()->user()->role != 'superadmin'
            &&
            $kela->gedung->fakultas_id
            != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        if (auth()->user()->role == 'superadmin') {

            $gedung = Gedung::with('fakultas')->get();

        } else {

            $gedung = Gedung::where(
                'fakultas_id',
                auth()->user()->fakultas_id
            )->get();
        }

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
        if (
            auth()->user()->role != 'superadmin'
            &&
            $kela->gedung->fakultas_id
            != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        $request->validate([
            'gedung_id' => 'required',
            'nama_kelas' => 'required',
            'keterangan' => 'nullable'
        ]);

        $gedung = Gedung::findOrFail(
            $request->gedung_id
        );

        if (
            auth()->user()->role != 'superadmin'
            &&
            $gedung->fakultas_id
            != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

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
        if (
            auth()->user()->role != 'superadmin'
            &&
            $kela->gedung->fakultas_id
            != auth()->user()->fakultas_id
        ) {
            abort(403);
        }

        $kela->delete();

        return redirect()
            ->route('kelas.index')
            ->with(
                'success',
                'Data kelas berhasil dihapus'
            );
    }
}