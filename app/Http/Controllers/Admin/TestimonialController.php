<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\TestimonialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $items = Testimonial::orderBy('order')->get();
        return view('adminpanel.testimonials.index', compact('items'));
    }

    public function create()
    {
        $section = TestimonialSection::firstOrFail();
        return view('adminpanel.testimonials.create', compact('section'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'nullable',
            'company' => 'nullable',
            'message' => 'required',
            'photo' => 'nullable|image|max:100',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->photo->store('testimonials', 'public');
        }

        $data['testimonial_section_id'] = TestimonialSection::first()->id;
        $data['is_active'] = $request->has('is_active');

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial added');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('adminpanel.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'nullable',
            'company' => 'nullable',
            'message' => 'required',
            'photo' => 'nullable|image|max:100',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $data['photo'] = $request->photo->store('testimonials', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo) {
            Storage::disk('public')->delete($testimonial->photo);
        }

        $testimonial->delete();

        return back()->with('success', 'Testimonial deleted');
    }
}
