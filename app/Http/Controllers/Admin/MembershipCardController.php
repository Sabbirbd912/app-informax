<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipCard;
use App\Models\MembershipSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembershipCardController extends Controller
{
    public function index()
    {
        $cards = MembershipCard::orderBy('order')->get();
        return view('adminpanel.membership.cards.index', compact('cards'));
    }

    public function create()
    {
        $section = MembershipSection::firstOrFail();
        return view('adminpanel.membership.cards.create', compact('section'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'icon_type'        => 'required|in:emoji,svg,image',
            'icon_value_text'  => 'nullable|string',
            'icon_value_image' => 'nullable|image|max:100',
            'theme_color'      => 'nullable|string',
            'order'            => 'nullable|integer',
        ]);

        // icon handling
        if ($request->icon_type === 'image' && $request->hasFile('icon_value_image')) {
            $data['icon_value'] = $request->file('icon_value_image')
                ->store('membership', 'public');
        } else {
            $data['icon_value'] = $request->icon_value_text;
        }

        $data['membership_section_id'] = MembershipSection::first()->id;
        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;
        $data['theme_color'] = $data['theme_color'] ?? 'green';

        unset($data['icon_value_text'], $data['icon_value_image']);

        MembershipCard::create($data);

        return redirect()
            ->route('membership-cards.index')
            ->with('success', 'Membership card added');
    }

    public function edit(MembershipCard $card)
    {
        return view('adminpanel.membership.cards.edit', compact('card'));
    }

    public function update(Request $request, MembershipCard $card)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'icon_type'        => 'required|in:emoji,svg,image',
            'icon_value_text'  => 'nullable|string',
            'icon_value_image' => 'nullable|image|max:2048',
            'theme_color'      => 'nullable|string',
            'order'            => 'nullable|integer',
        ]);

        // icon handling
        if ($request->icon_type === 'image' && $request->hasFile('icon_value_image')) {

            // delete old image
            if ($card->icon_type === 'image' && $card->icon_value) {
                Storage::disk('public')->delete($card->icon_value);
            }

            $data['icon_value'] = $request->file('icon_value_image')
                ->store('membership', 'public');

        } else {
            $data['icon_value'] = $request->icon_value_text;
        }

        $data['is_active'] = $request->has('is_active');

        unset($data['icon_value_text'], $data['icon_value_image']);

        $card->update($data);

        return redirect()
            ->route('membership-cards.index')
            ->with('success', 'Membership card updated');
    }

    public function destroy(MembershipCard $card)
    {
        if ($card->icon_type === 'image' && $card->icon_value) {
            Storage::disk('public')->delete($card->icon_value);
        }

        $card->delete();

        return back()->with('success', 'Membership card deleted');
    }
}
