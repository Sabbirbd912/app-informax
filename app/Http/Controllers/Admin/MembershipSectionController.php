<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipSection;
use Illuminate\Http\Request;

class MembershipSectionController extends Controller
{
    /**
     * Show the form for editing the membership section.
     */
    public function edit()
    {
        // 1. Rename variable to $membershipSection to match the Blade file
        // 2. Use .with('membershipCards') to ensure the $membershipSection->membershipCards relationship is available
        $membershipSection = MembershipSection::with('membershipCards')->firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Memberships & Certifications',
                'is_active' => true
            ]
        );

        // Pass the variable with the name the Blade template expects
        return view('adminpanel.membership.section', compact('membershipSection'));
    }

    /**
     * Update the membership section in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        // Find the record (ID 1 as established in the edit method)
        $membershipSection = MembershipSection::findOrFail(1);

        $membershipSection->update([
            'title' => $request->title,
            // $request->has() returns a boolean, which is cleaner for 'is_active'
            'is_active' => $request->has('is_active')
        ]);

        return back()->with('success', 'Membership section updated successfully');
    }
}