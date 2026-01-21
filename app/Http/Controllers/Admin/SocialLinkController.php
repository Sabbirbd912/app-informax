<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::orderBy('order')->get();
        return view('adminpanel.social.index', compact('links'));
    }

    public function create()
    {
        return view('adminpanel.social.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'required|url',
            'icon_type' => 'required|in:emoji,svg',
            'icon_value' => 'required',
            'theme_color' => 'required',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');
        SocialLink::create($data);

        return redirect()->route('social-links.index')
            ->with('success', 'Social link added');
    }

    public function edit(SocialLink $social_link)
    {
        return view('adminpanel.social.edit', compact('social_link'));
    }

    public function update(Request $request, SocialLink $social_link)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'required|url',
            'icon_type' => 'required|in:emoji,svg',
            'icon_value' => 'required',
            'theme_color' => 'required',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');
        $social_link->update($data);

        return redirect()->route('social-links.index')
            ->with('success', 'Social link updated');
    }

    public function destroy(SocialLink $social_link)
    {
        $social_link->delete();
        return back()->with('success', 'Deleted successfully');
    }
}

