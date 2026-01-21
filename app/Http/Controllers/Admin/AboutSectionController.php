<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function edit()
    {
        $section = AboutSection::firstOrCreate(
            ['id' => 1],
            ['main_title' => 'About Us', 'is_active' => 1]
        );

        return view('adminpanel.about.section', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_title' => 'required|string|max:255'
        ]);

        $section = AboutSection::first();
        $section->update([
            'main_title' => $request->main_title,
            'is_active' => $request->has('is_active')
        ]);

        return back()->with('success', 'About section updated');
    }
}
