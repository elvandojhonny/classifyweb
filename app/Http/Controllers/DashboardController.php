<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Gedung;
use App\Models\Fakultas;
use App\Models\Peminjaman;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD USER
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        $totalPengajuan = Peminjaman::where('user_id', auth()->id())
            ->count();

        $disetujui = Peminjaman::where('user_id', auth()->id())
            ->where('status', 'disetujui')
            ->count();

        $ditolak = Peminjaman::where('user_id', auth()->id())
            ->where('status', 'ditolak')
            ->count();

        $menunggu = Peminjaman::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->count();

        $aktivitas = Peminjaman::with('kelas')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        $pengumuman = Pengumuman::where('aktif', true)
            ->latest()
            ->take(3)
            ->get();

        return view('user.dashboard', compact(
            'totalPengajuan',
            'disetujui',
            'ditolak',
            'menunggu',
            'aktivitas',
            'pengumuman'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    public function admin()
{
    // SUPER ADMIN
    if (auth()->user()->role == 'superadmin') {

        $totalFakultas = Fakultas::count();

        $totalGedung = Gedung::count();

        $totalKelas = Kelas::count();

        $totalUser = User::count();

        $aktivitas = Peminjaman::with(
                'user',
                'kelas.gedung.fakultas'
            )
            ->latest()
            ->take(5)
            ->get();

    }

    // ADMIN FAKULTAS
    else {

        $fakultasId = auth()->user()->fakultas_id;

        $totalFakultas = 1;

        $totalGedung = Gedung::where(
            'fakultas_id',
            $fakultasId
        )->count();

        $totalKelas = Kelas::whereHas(
            'gedung',
            function ($q) use ($fakultasId) {

                $q->where(
                    'fakultas_id',
                    $fakultasId
                );

            }
        )->count();

        $totalUser = User::where(
            'fakultas_id',
            $fakultasId
        )->count();

        $aktivitas = Peminjaman::with(
                'user',
                'kelas.gedung.fakultas'
            )
            ->whereHas(
                'kelas.gedung',
                function ($q) use ($fakultasId) {

                    $q->where(
                        'fakultas_id',
                        $fakultasId
                    );

                }
            )
            ->latest()
            ->take(5)
            ->get();
    }

    return view('admin.dashboard', compact(
        'totalFakultas',
        'totalGedung',
        'totalKelas',
        'totalUser',
        'aktivitas'
    ));
}
}