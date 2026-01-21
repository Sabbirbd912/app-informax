<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientItem;
use App\Models\ClientSection;
use Illuminate\Support\Facades\Storage;

class ClientItemController extends Controller
{
    /**
     * Display list of client items
     */
    public function index()
    {
        $items = ClientItem::orderBy('order')->get();
        return view('adminpanel.clients.items.index', compact('items'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('adminpanel.clients.items.create');
    }

    /**
     * Store new client item
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon_type' => 'required|in:emoji,svg,image',
            'icon_value' => 'nullable',
            'theme_color' => 'nullable|string|max:50',
            'order' => 'nullable|integer',
        ]);

        // Ensure Client Section exists
        $section = ClientSection::first();
        if (!$section) {
            return back()->with('error', 'Please create Client Section first.');
        }

        /**
         * Handle icon upload (STORE)
         */
        if ($request->icon_type === 'image' && $request->hasFile('icon_value')) {
            $data['icon_value'] = $request->file('icon_value')
                ->store('clients', 'public');
        }

        $data['client_section_id'] = $section->id;
        $data['is_active'] = $request->boolean('is_active');
        $data['order'] = $data['order'] ?? 0;

        ClientItem::create($data);

        return redirect()
            ->route('client-items.index')
            ->with('success', 'Client item created successfully');
    }

    /**
     * Show edit form
     */
    public function edit(ClientItem $clientItem)
    {
        return view('adminpanel.clients.items.edit', compact('clientItem'));
    }

    /**
     * Update client item
     */
    public function update(Request $request, ClientItem $clientItem)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon_type' => 'required|in:emoji,svg,image',
            'icon_value' => 'nullable',
            'theme_color' => 'nullable|string|max:50',
            'order' => 'nullable|integer',
        ]);

        /**
         * Handle icon update
         */
        if ($request->icon_type === 'image') {
            if ($request->hasFile('icon_value')) {
                // নতুন ফাইল আসলে পুরনোটা ডিলিট করুন
                if ($clientItem->icon_value && Storage::disk('public')->exists($clientItem->icon_value)) {
                    Storage::disk('public')->delete($clientItem->icon_value);
                }
                $data['icon_value'] = $request->file('icon_value')->store('clients', 'public');
            } else {
                // নতুন ফাইল না দিলে আগের ভ্যালু রেখে দিন
                $data['icon_value'] = $clientItem->icon_value;
            }
        } else {
            // যদি টাইপ পরিবর্তন করে Emoji বা SVG করা হয়, তবে পুরনো ফাইল ডিলিট করুন
            if ($clientItem->icon_type === 'image' && $clientItem->icon_value) {
                Storage::disk('public')->delete($clientItem->icon_value);
            }
            $data['icon_value'] = $request->icon_value;
        }

        $data['is_active'] = $request->boolean('is_active');

        $clientItem->update($data);

        return redirect()
            ->route('client-items.index')
            ->with('success', 'Client item updated successfully');
    }

    /**
     * Delete client item
     */
    public function destroy(ClientItem $clientItem)
    {
        if (
            $clientItem->icon_type === 'image' &&
            $clientItem->icon_value &&
            Storage::disk('public')->exists($clientItem->icon_value)
        ) {
            Storage::disk('public')->delete($clientItem->icon_value);
        }

        $clientItem->delete();

        return back()->with('success', 'Client item deleted successfully');
    }
}
