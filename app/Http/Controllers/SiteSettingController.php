<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::pluck('value', 'key')->toArray();
        return view('backend.settings.form', compact('setting'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required|digits:10',
                'email' => 'required|email|max:250',
                'name' => 'required|string|max:250',
                'facebook' => 'nullable|url|max:255'
            ]);

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '_' . $logo->getClientOriginalName();
                $logoPath = $logo->storeAs('public/logos', $logoName);
                $logoUrl = 'storage/logos/' . $logoName;

                // Delete existing logo if exists
                $existingLogo = Setting::where('key', 'logo')->value('value');
                if ($existingLogo && Storage::exists(str_replace('storage/', 'public/', $existingLogo))) {
                    Storage::delete(str_replace('storage/', 'public/', $existingLogo));
                }

                // Save new logo setting
                Setting::updateOrCreate(['key' => 'logo'], ['value' => $logoUrl]);
            }

            // Update other settings
            foreach ($request->except('_token', 'logo') as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }

            return redirect()->back()->with('success', 'Settings updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
