<?php

namespace App\Http\Controllers;

use App\Models\Cooperative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CooperativeController extends Controller
{
    public function index()
    {
        return view('admin.cooperatives.index', ['cooperatives' => Cooperative::all()]);
    }

    public function create()
    {
        return view('admin.cooperatives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        Cooperative::create($request->all());
        return redirect()->route('cooperatives.index');
    }

    public function show(Cooperative $cooperative)
    {
        return view('admin.cooperatives.show', compact('cooperative'));
    }

    public function edit(Cooperative $cooperative)
    {
        return view('admin.cooperatives.edit', compact('cooperative'));
    }

    public function update(Request $request, Cooperative $cooperative)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $cooperative->update($request->all());
        return redirect()->route('cooperatives.index');
    }

    public function destroy(Cooperative $cooperative)
    {
        $cooperative->delete();
        return redirect()->route('cooperatives.index');
    }

    public function coopDashboard()
    {
        $cooperative = Cooperative::all();
        return view('cooperatives.dashboard', compact('cooperative'));
    }
    public function coopProfile()
    {
        $cooperative = Cooperative::where('user_id', Auth::User()->id)->first();
        return view('cooperatives.profile', compact('cooperative'));
    }
    public function coopMembers($id)
    {
        $cooperative = Cooperative::findOrFail($id);
        return view('admin.cooperatives.members', compact('cooperative'));
    }
    public function updateCoop(Request $request)
    {

        $request->validate([
            'registration_number' => 'nullable|string',
            'phone' => 'nullable|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'established_at' => 'nullable|date',
        ]);
        
        $cooperative = Cooperative::where('user_id', Auth::User()->id)->first();
        
        if (!$cooperative) {
            return redirect()->back()->with('error', 'Cooperative not found.');
        }
        
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $cooperative->logo = $filename;
        }
        
        $cooperative->registration_number = $request->input('registration_number');
        $cooperative->phone = $request->input('phone');
        $cooperative->description = $request->input('description');
        $cooperative->established_at = $request->input('established_at');
        $cooperative->save(); // or $cooperative->update()
        

        return redirect()->route('cooperative.profile')->with('success', 'Profile updated successfully.');
    }
}
