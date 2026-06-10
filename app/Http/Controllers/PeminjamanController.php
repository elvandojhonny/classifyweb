<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Kelas;

class PeminjamanController extends Controller
{
    // =========================
    // USER - FORM PEMINJAMAN
    // =========================
    public function create($kelas_id)
    {
        $kelas = Kelas::with('gedung.fakultas')

    ->whereHas('gedung', function ($q){

        $q->where(
            'fakultas_id',
            auth()->user()->fakultas_id
        );

    })

    ->findOrFail($kelas_id);

        return view('user.peminjaman.create', compact('kelas'));
    }

    // =========================
    // USER - SIMPAN DATA
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keperluan' => 'required'
        ]);

        $kelas = Kelas::with('gedung')
        ->findOrFail($request->kelas_id);

        if(
            $kelas->gedung->fakultas_id
            != auth()->user()->fakultas_id
        ){
            abort(403);
        }

        Peminjaman::create([
            'user_id' => auth()->id(),
            'kelas_id' => $request->kelas_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keperluan' => $request->keperluan,
            'status' => 'pending'
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pengajuan berhasil dikirim');
    }

    // =========================
    // USER - RIWAYAT
    // =========================
    public function riwayat()
    {
        $riwayat = Peminjaman::with('kelas.gedung.fakultas')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.riwayat', compact('riwayat'));
    }

    // =========================
    // ADMIN - LIST DATA
    // =========================
    public function index()
    {
        $data = Peminjaman::with(
        'user',
        'kelas.gedung.fakultas'
    )

    ->whereHas('kelas.gedung', function ($q){

        $q->where(
            'fakultas_id',
            auth()->user()->fakultas_id
        );

    })

    ->latest()

    ->get();

        return view('admin.peminjaman.index', compact('data'));
    }

    // =========================
    // ADMIN - APPROVE
    // =========================
    public function approve($id)
    {
        $data = Peminjaman::with('kelas.gedung')
    ->findOrFail($id);

if(
    $data->kelas->gedung->fakultas_id
    != auth()->user()->fakultas_id
){
    abort(403);
}

        $data->update([
            'status' => 'disetujui'
        ]);

        return back()->with('success', 'Pengajuan disetujui');
    }

    // =========================
    // ADMIN - REJECT
    // =========================
    public function reject($id)
    {
       $data = Peminjaman::with('kelas.gedung')
    ->findOrFail($id);

if(
    $data->kelas->gedung->fakultas_id
    != auth()->user()->fakultas_id
){
    abort(403);
}

$data->update([
    'status' => 'ditolak'
]);

        return back()->with('success', 'Pengajuan ditolak');
    }
}