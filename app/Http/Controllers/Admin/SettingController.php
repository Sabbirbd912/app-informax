<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('key')->get();
        return view('adminpanel.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->settings as $id => $value) {
            $setting = Setting::find($id);

            if ($setting->type === 'image' && $request->hasFile("settings.$id")) {
                $path = $request->file("settings.$id")->store('settings', 'public');
                $setting->update(['value' => $path]);
            } else {
                $setting->update(['value' => $value]);
            }
        }

        cache()->flush();

        return back()->with('success', 'Settings updated successfully');
    }

}
