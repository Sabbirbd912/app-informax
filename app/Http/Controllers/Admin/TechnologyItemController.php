<?php

// App\Http\Controllers\Admin\TechnologyItemController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechnologyItem;
use App\Models\TechnologySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyItemController extends Controller
{
    public function index()
    {
        $items = TechnologyItem::orderBy('order')->get();
        return view('adminpanel.technology.items.index', compact('items'));
    }

    public function create()
    {
        return view('adminpanel.technology.items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'border_color' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $section = TechnologySection::first();
        if (!$section) {
            return back()->with('error', 'Please create a Technology Section first.');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('technology', 'public');
            $data['emoji'] = null;
        }

        $data['technology_section_id'] = $section->id;
        $data['is_active'] = $request->has('is_active');

        TechnologyItem::create($data);

        return redirect()->route('technology-items.index')->with('success', 'Technology item created successfully');
    }

    public function edit(TechnologyItem $technology_item)
    {
        return view('adminpanel.technology.items.edit', ['item' => $technology_item]);
    }

    public function update(Request $request, TechnologyItem $technology_item)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'border_color' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($technology_item->image) {
                Storage::disk('public')->delete($technology_item->image);
            }
            $data['image'] = $request->file('image')->store('technology', 'public');
            $data['emoji'] = null;
        }

        $data['is_active'] = $request->has('is_active');
        $technology_item->update($data);

        return redirect()->route('technology-items.index')->with('success', 'Technology item updated successfully');
    }

    public function destroy(TechnologyItem $technology_item)
    {
        if ($technology_item->image) {
            Storage::disk('public')->delete($technology_item->image);
        }
        $technology_item->delete();
        return redirect()->route('technology-items.index')->with('success', 'Technology item deleted successfully');
    }
}
