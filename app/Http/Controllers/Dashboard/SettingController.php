<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- IMPORT STORAGE

class SettingController extends Controller
{
    /**
     * Menampilkan halaman form pengaturan.
     */
    public function index()
    {
        $settings = Setting::pluck('value', 'key');

        return view('dashboard.settings.index', [
            'settings' => $settings
        ]);
    }

    /**
     * Update data pengaturan di database.
     */
    public function update(Request $request)
    {
        // Validasi
        $request->validate([
            // Validasi Logo (BARU)
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // maks 2MB

            'video_url' => 'nullable|url',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        // ============================
        // LOGIKA UPLOAD LOGO (BARU)
        // ============================
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($request->oldLogo) {
                Storage::disk('public')->delete($request->oldLogo);
            }
            // Upload logo baru ke folder 'logos'
            $logoPath = $request->file('logo')->store('logos', 'public');
            // Simpan path baru ke database
            Setting::updateOrCreate(
                ['key' => 'logo_path'],
                ['value' => $logoPath]
            );
        }
        // ============================
        // AKHIR LOGIKA UPLOAD LOGO
        // ============================

        // Simpan setting lainnya (video, visi, misi)
        Setting::updateOrCreate(
            ['key' => 'video_url'],
            ['value' => $request->input('video_url')]
        );
        Setting::updateOrCreate(
            ['key' => 'visi'],
            ['value' => $request->input('visi')]
        );
        Setting::updateOrCreate(
            ['key' => 'misi'],
            ['value' => $request->input('misi')]
        );

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
