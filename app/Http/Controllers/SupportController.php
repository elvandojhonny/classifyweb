<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SupportController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'nomor' => 'required',
            'kategori' => 'required',
            'pesan' => 'required',

        ]);

        $admin = env('FONNTE_ADMIN');

        $message = "

📢 *LAPORAN KENDALA SISTEM*

👤 Nama : {$request->nama}
📱 Nomor : {$request->nomor}
📌 Kategori : {$request->kategori}

📝 Detail Kendala:
{$request->pesan}

⏰ " . now()->format('d M Y H:i');

        try {

            $response = Http::withHeaders([

                'Authorization' => env('FONNTE_TOKEN')

            ])->asForm()->post('https://api.fonnte.com/send', [

                'target' => $admin,
                'message' => $message,

            ]);

            if ($response->successful()) {

                return back()->with(
                    'success',
                    'Laporan berhasil dikirim ke admin'
                );

            }

            return back()->with(
                'error',
                'Gagal mengirim laporan'
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'Terjadi kesalahan koneksi'
            );

        }
    }
}