<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSection;

class ContactSectionController extends Controller
{
    public function edit()
    {
        $section = ContactSection::firstOrCreate([]);
        return view('adminpanel.contact.section', compact('section'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'section_title' => 'required|string',
            'map_embed_url' => 'required',
            'map_title'     => 'nullable|string',
        ]);

        ContactSection::first()->update($data);

        return back()->with('success', 'Contact section updated');
    }
}
