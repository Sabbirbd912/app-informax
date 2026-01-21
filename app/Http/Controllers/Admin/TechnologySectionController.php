<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TechnologySection; // ১. মডেলটি অবশ্যই এখানে অ্যাড করতে হবে

class TechnologySectionController extends Controller
{
    public function edit()
    {
        // এটি ঠিক আছে, ডাটা না থাকলে তৈরি করবে
        $section = TechnologySection::firstOrCreate(['id' => 1]);
        return view('adminpanel.technology.section', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        // ২. firstOrCreate বা findOrFail ব্যবহার করা নিরাপদ
        $section = TechnologySection::firstOrCreate(['id' => 1]);
        
        $section->update([
            'title' => $request->title,
            // ৩. 'is_active' কে বুলিয়ান (0 বা 1) হিসেবে সেভ করা ভালো
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        return back()->with('success', 'Section updated successfully');
    }
}