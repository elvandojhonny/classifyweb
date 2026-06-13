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

    // Tidak boleh tanggal lampau
    if (
        $request->tanggal <
        now()->toDateString()
    ) {
        return back()->with(
            'error',
            'Tidak dapat meminjam pada tanggal yang sudah lewat.'
        );
    }

    // Tidak boleh jam hari ini yang sudah lewat
    if (
        $request->tanggal == now()->toDateString()
        &&
        $request->jam_mulai <= now()->format('H:i')
    ) {
        return back()->with(
            'error',
            'Jam peminjaman sudah lewat.'
        );
    }

    // Jam selesai harus lebih besar
    if (
        strtotime($request->jam_mulai)
        >=
        strtotime($request->jam_selesai)
    ) {
        return back()->with(
            'error',
            'Jam selesai harus lebih besar dari jam mulai.'
        );
    }

    // Cek bentrok jadwal
    $cekBentrok = Peminjaman::where(
            'kelas_id',
            $request->kelas_id
        )

        ->where(
            'tanggal',
            $request->tanggal
        )

        ->where(
            'status',
            'disetujui'
        )

        ->where(
            'jam_mulai',
            '<',
            $request->jam_selesai
        )

        ->where(
            'jam_selesai',
            '>',
            $request->jam_mulai
        )

        ->exists();

    if ($cekBentrok) {

        return back()->with(
            'error',
            'Ruangan sudah digunakan pada jadwal tersebut.'
        );
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
        ->with(
            'success',
            'Pengajuan berhasil dikirim.'
        );
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
    if(auth()->user()->role == 'superadmin')
    {
        $data = Peminjaman::with(
            'user.fakultas',
            'kelas.gedung.fakultas'
        )
        ->latest()
        ->get();
    }
    else
    {
        $data = Peminjaman::with(
            'user.fakultas',
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
    }

    return view(
        'admin.peminjaman.index',
        compact('data')
    );
}

    // =========================
    // ADMIN - APPROVE
    // =========================
    public function approve($id)
    {
        $data = Peminjaman::with('kelas.gedung')
    ->findOrFail($id);

if(
    auth()->user()->role != 'superadmin'
    &&
    $data->kelas->gedung->fakultas_id
    != auth()->user()->fakultas_id
){
    abort(403);
}

$cekBentrok = Peminjaman::where(
        'kelas_id',
        $data->kelas_id
    )
    ->where(
        'tanggal',
        $data->tanggal
    )
    ->where(
        'status',
        'disetujui'
    )
    ->where(
        'id',
        '!=',
        $data->id
    )
    ->where(
        'jam_mulai',
        '<',
        $data->jam_selesai
    )
    ->where(
        'jam_selesai',
        '>',
        $data->jam_mulai
    )
    ->exists();

if ($cekBentrok) {

    return back()->with(
        'error',
        'Tidak dapat disetujui karena jadwal bentrok dengan peminjaman yang sudah disetujui.'
    );
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
    auth()->user()->role != 'superadmin'
    &&
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