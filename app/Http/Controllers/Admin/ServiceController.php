<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('adminpanel.services.index', compact('services'));
    }

    public function create()
    {
        return view('adminpanel.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'nullable',
            'icon_image' => 'nullable|image|max:2048',
            'theme_color' => 'required',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('icon_image')) {
            $data['icon'] = $request->file('icon_image')
                ->store('services', 'public');
        }

        $data['service_section_id'] = 1;
        $data['is_active'] = $request->has('is_active');

        Service::create($data);

        return redirect()->route('services.index')
            ->with('success', 'Service added');
    }

    public function edit(Service $service)
    {
        return view('adminpanel.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'nullable',
            'icon_image' => 'nullable|image|max:2048',
            'theme_color' => 'required',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('icon_image')) {
            $data['icon'] = $request->file('icon_image')
                ->store('services', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $service->update($data);

        return redirect()->route('services.index')
            ->with('success', 'Service updated');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service deleted');
    }
}
