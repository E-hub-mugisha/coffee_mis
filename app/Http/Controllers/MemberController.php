<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Cooperative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $cooperative = Cooperative::where('user_id', Auth::id())->firstOrFail();
        $members = $cooperative->members;

        return view('cooperatives.members', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'national_id' => 'required|string|max:16|unique:members',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'role' => 'required|string',
            'address' => 'nullable|string',
            'join_date' => 'nullable|date',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $cooperative = Cooperative::where('user_id', Auth::id())->firstOrFail();

        $member = new Member($request->except('profile_photo'));
        $member->cooperative_id = $cooperative->id;

        if ($request->hasFile('profile_photo')) {
            $filename = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('uploads/members'), $filename);
            $member->profile_photo = 'uploads/members/' . $filename;
        }

        $member->save();

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'role' => 'required|string',
            'address' => 'nullable|string',
            'join_date' => 'nullable|date',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $member->fill($request->except('profile_photo'));

        if ($request->hasFile('profile_photo')) {
            $filename = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('uploads/members'), $filename);
            $member->profile_photo = 'uploads/members/' . $filename;
        }

        $member->save();

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted.');
    }
}

