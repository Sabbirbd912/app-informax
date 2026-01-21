<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutCard;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutCardController extends Controller
{
    public function index()
    {
        $cards = AboutCard::orderBy('order')->get();
        return view('adminpanel.about.cards.index', compact('cards'));
    }

    public function create()
    {
        $section = AboutSection::first();
        return view('adminpanel.about.cards.create', compact('section'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'icon'    => 'nullable|image|max:2048',
            'order'   => 'nullable|integer',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('about', 'public');
        }

        $data['about_section_id'] = AboutSection::first()->id;
        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;

        AboutCard::create($data);

        return redirect()
            ->route('about-cards.index')
            ->with('success', 'Card added');
    }

    public function edit(AboutCard $card)
    {
        return view('adminpanel.about.cards.edit', compact('card'));
    }

    public function update(Request $request, AboutCard $card)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'icon'    => 'nullable|image|max:2048',
            'order'   => 'nullable|integer',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('about', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $card->update($data);

        return redirect()
            ->route('about-cards.index')
            ->with('success', 'Card updated');
    }

    public function destroy(AboutCard $card)
    {
        $card->delete();
        return back()->with('success', 'Card deleted');
    }
}
