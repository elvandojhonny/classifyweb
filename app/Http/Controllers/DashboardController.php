<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Gedung;
use App\Models\Fakultas;
use App\Models\Peminjaman;
use App\Models\Pengumuman;
use App\Models\Setting;

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

        $jamOperasional = Setting::first()?->jam_operasional ?? '08:30 - 17:00';

        $totalAktivitas = $aktivitas->count();

        $statusSistem = !app()->isDownForMaintenance();


        return view('user.dashboard', compact(
            'totalPengajuan',
            'disetujui',
            'ditolak',
            'menunggu',
            'aktivitas',
            'totalAktivitas',
            'pengumuman',
            'statusSistem',
            'jamOperasional'
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
        $totalGedung   = Gedung::count();
        $totalKelas    = Kelas::count();
        $totalUser     = User::count();

        $aktivitas = Peminjaman::with(
                'user',
                'kelas.gedung.fakultas'
            )
            ->latest()
            ->take(5)
            ->get();

        $totalPeminjaman = Peminjaman::count();

        $totalDisetujui = Peminjaman::where(
            'status',
            'disetujui'
        )->count();

        $totalPending = Peminjaman::where(
            'status',
            'pending'
        )->count();

        $pengumuman = Pengumuman::latest()
            ->take(5)
            ->get();

    } else {

        $fakultasId = auth()->user()->fakultas_id;

        $totalFakultas = 1;

        $totalGedung = Gedung::where(
            'fakultas_id',
            $fakultasId
        )->count();

        $totalKelas = Kelas::whereHas(
            'gedung',
            function ($q) use ($fakultasId) {
                $q->where('fakultas_id', $fakultasId);
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
                    $q->where('fakultas_id', $fakultasId);
                }
            )
            ->latest()
            ->take(5)
            ->get();

        $totalPeminjaman = Peminjaman::whereHas(
            'kelas.gedung',
            function ($q) use ($fakultasId) {
                $q->where('fakultas_id', $fakultasId);
            }
        )->count();

        $totalDisetujui = Peminjaman::where(
            'status',
            'disetujui'
        )
        ->whereHas(
            'kelas.gedung',
            function ($q) use ($fakultasId) {
                $q->where('fakultas_id', $fakultasId);
            }
        )
        ->count();

        $totalPending = Peminjaman::where(
            'status',
            'pending'
        )
        ->whereHas(
            'kelas.gedung',
            function ($q) use ($fakultasId) {
                $q->where('fakultas_id', $fakultasId);
            }
        )
        ->count();

        $pengumuman = Pengumuman::latest()
            ->take(5)
            ->get();
            
    }

    $totalAktivitas = $aktivitas->count();

    $statusSistem = !app()->isDownForMaintenance();

    $jamOperasional = Setting::first()?->jam_operasional ?? '08:00 - 17:00';

    return view('admin.dashboard', compact(
        'totalFakultas',
        'totalGedung',
        'totalKelas',
        'totalUser',
        'aktivitas',
        'totalAktivitas',
        'totalPeminjaman',
        'totalDisetujui',
        'totalPending',
        'pengumuman',
        'statusSistem',
        'jamOperasional'
    ));
}
}
