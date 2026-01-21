<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavbarMenu;
use Illuminate\Http\Request;

class NavbarMenuController extends Controller
{
    public function index()
    {
        $menus = NavbarMenu::orderBy('order')->get();
        return view('adminpanel.navbar.index', compact('menus'));
    }

    public function create()
    {
        return view('adminpanel.navbar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $data['order'] = $data['order'] ?? 0;
        $data['is_active'] = $request->has('is_active');

        NavbarMenu::create($data);

        return redirect()->route('navbar-menus.index')
            ->with('success', 'Menu added successfully');
    }

    public function edit(NavbarMenu $navbar_menu)
    {
        return view('adminpanel.navbar.edit', compact('navbar_menu'));
    }

    public function update(Request $request, NavbarMenu $navbar_menu)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');

        $navbar_menu->update($data);

        return redirect()->route('navbar-menus.index')
            ->with('success', 'Menu updated successfully');
    }

    public function destroy(NavbarMenu $navbar_menu)
    {
        $navbar_menu->delete();
        return back()->with('success', 'Menu deleted');
    }
}