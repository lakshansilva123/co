<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrCreate([]);
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $setting->app_name = $request->app_name;

        if ($request->hasFile('logo')) {
            if ($setting->logo_path) {
                Storage::disk('public')->delete($setting->logo_path);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
            $setting->logo_path = $logoPath;
        }

        $setting->save();

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
