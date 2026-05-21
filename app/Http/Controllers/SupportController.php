<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SupportController extends Controller
{
    public function send(Request $request)
    {
        try{

            $pesan =
"📢 LAPORAN SISTEM PEMINJAMAN

👤 Nama: {$request->nama}

📧 Email: {$request->email}

📱 HP: {$request->hp}

📌 Kategori:
{$request->kategori}

⚠ Prioritas:
{$request->prioritas}

📝 Detail:
{$request->detail}";

            $response = Http::withoutVerifying()
    ->asForm()
                ->withHeaders([
                    'Authorization' => env('FONNTE_TOKEN')
                ])
                ->post('https://api.fonnte.com/send', [
                    'target' => env('FONNTE_ADMIN'),
                    'message' => $pesan,
                ]);

            return response()->json([
                'success' => true,
                'data' => $response->json()
            ]);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ],500);

        }
    }
}