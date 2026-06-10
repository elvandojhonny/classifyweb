<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();

        if(!$setting){

            $setting = Setting::create([
                'system_name' => 'Kampus App',
                'system_status' => 'ONLINE',
                'operational_hours' => 'Senin - Sabtu | 08:00 - 22:00',
                'support_email' => 'admin@kampus.ac.id',
                'support_phone' => '0822xxxx',
                'running_text' => 'Selamat datang di sistem peminjaman kampus',
                'welcome_description' => 'Platform digital modern untuk pengelolaan ruang kelas kampus'
            ]);

        }

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $setting->update($request->all());

        return back()->with('success','Pengaturan berhasil diupdate');
    }
}