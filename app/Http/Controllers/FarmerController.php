<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Cooperative;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        $cooperatives = Cooperative::all();
        return view('admin.farmers.index', ['farmers' => Farmer::all(), 'cooperatives' => $cooperatives]);
    }

    public function create()
    {
        return view('farmers.create', ['cooperatives' => Cooperative::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:farmers',
            'cooperative_id' => 'required|exists:cooperatives,id',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        Farmer::create($request->all());
        return redirect()->route('farmers.index');
    }

    public function show(Farmer $farmer)
    {
        return view('farmers.show', compact('farmer'));
    }

    public function edit(Farmer $farmer)
    {
        return view('farmers.edit', ['farmer' => $farmer, 'cooperatives' => Cooperative::all()]);
    }

    public function update(Request $request, Farmer $farmer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:farmers,email,' . $farmer->id,
            'cooperative_id' => 'required|exists:cooperatives,id',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $farmer->update($request->all());
        return redirect()->route('farmers.index');
    }

    public function destroy(Farmer $farmer)
    {
        $farmer->delete();
        return redirect()->route('farmers.index');
    }
}
