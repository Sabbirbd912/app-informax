<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AboutContentController extends Controller
{

    public function edit()
    {
        $section = AboutSection::with('content')->firstOrFail();

        return view('adminpanel.about.content.edit', [
            'section' => $section,
            'content' => $section->content,
        ]);
    }

    public function update(Request $request)
    {
        $section = AboutSection::with('content')->firstOrFail();

        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'image_alt'    => 'nullable|string|max:255',
            'button_text'  => 'nullable|string|max:100',
            'button_link'  => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {

            if ($section->content && $section->content->image) {
                Storage::disk('public')->delete($section->content->image);
            }

            $data['image'] = $request->file('image')
                ->store('about', 'public');
        }

        $section->content()->updateOrCreate(
            ['about_section_id' => $section->id],
            $data
        );

        return redirect()
            ->route('admin.about.content.edit')
            ->with('success', 'About content saved successfully');
    }
}
