<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceSection;

class ServiceSectionController extends Controller
{
    public function edit()
    {
        $section = ServiceSection::firstOrCreate(['id' => 1]);
        return view('adminpanel.services.section', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $section = ServiceSection::first();
        $section->update([
            'title' => $request->title,
            'is_active' => $request->has('is_active')
        ]);

        return back()->with('success', 'Service section updated');
    }
}

