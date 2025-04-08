<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function index()
    {
        $farmers = Farmer::all();
        return view('admin.farms.index', ['farms' => Farm::all()] + ['farmers' => $farmers]);
    }

    public function create()
    {
        return view('admin.farms.create', ['farmers' => Farmer::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'farmer_id' => 'required|exists:farmers,id',
            'name' => 'required|string|max:255',
            'size_in_hectares' => 'required|numeric',
            'location' => 'required|string',
        ]);

        Farm::create($request->all());
        return redirect()->route('farms.index');
    }

    public function show(Farm $farm)
    {
        return view('admin.farms.show', compact('farm'));
    }

    public function edit(Farm $farm)
    {
        return view('admin.farms.edit', ['farm' => $farm, 'farmers' => Farmer::all()]);
    }

    public function update(Request $request, Farm $farm)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'size_in_hectares' => 'required|numeric',
            'location' => 'required|string',
        ]);

        $farm->update($request->all());
        return redirect()->route('farms.index');
    }

    public function destroy(Farm $farm)
    {
        $farm->delete();
        return redirect()->route('farms.index');
    }
}
