<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSection;
use Illuminate\Http\Request;

class ProductSectionController extends Controller
{
    public function edit()
    {
        $section = ProductSection::firstOrCreate(['id' => 1]);
        return view('adminpanel.products.section', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $section = ProductSection::first();
        $section->update([
            'title' => $request->title,
            'is_active' => $request->has('is_active')
        ]);

        return back()->with('success', 'Product section updated');
    }
}

