<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('adminpanel.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('adminpanel.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'media_type' => 'required|in:image,video',
            'media' => 'required|file'
        ]);

        $path = $request->file('media')->store('sliders', 'public');

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'media_type' => $request->media_type,
            'media_path' => $path,
            'order' => Slider::max('order') + 1,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('sliders.index')
            ->with('success', 'Slider created');
    }

    public function edit(Slider $slider)
    {
        return view('adminpanel.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->only([
            'title',
            'subtitle',
            'button_text',
            'button_link',
        ]);

        // ACTIVE / DEACTIVE FIX
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // ORDER FIX
        if ($request->filled('order')) {
            $data['order'] = (int) $request->order;
        }

        // MEDIA UPDATE
        if ($request->hasFile('media')) {
            $data['media_path'] =
                $request->file('media')->store('sliders', 'public');
        }

        $slider->update($data);

        return redirect()
            ->route('sliders.index')
            ->with('success', 'Slider updated successfully');
    }


    public function destroy(Slider $slider)
    {
        $slider->delete();
        return back()->with('success', 'Slider deleted');
    }
}
