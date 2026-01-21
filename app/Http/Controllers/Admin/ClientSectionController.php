<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientSection;

class ClientSectionController extends Controller
{
    public function edit()
    {
        // যদি না থাকে, তাহলে নিজে থেকেই একটা row তৈরি করবে
        $section = ClientSection::firstOrCreate(['id' => 1]);

        return view('adminpanel.clients.section', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $section = ClientSection::firstOrCreate(['id' => 1]);

        $section->update([
            'title'     => $request->title,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return back()->with('success', 'Client section updated successfully');
    }
}
