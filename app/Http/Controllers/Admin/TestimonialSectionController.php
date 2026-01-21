<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestimonialSection;
use Illuminate\Http\Request;

class TestimonialSectionController extends Controller
{
    public function edit()
    {
        $section = TestimonialSection::firstOrCreate([]);
        return view('adminpanel.testimonials.section', compact('section'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $section = TestimonialSection::first();
        $section->update([
            'title' => $data['title'],
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', 'Testimonial section updated');
    }
}
