<?php

namespace App\Http\Controllers;

use App\Models\Cooperative;
use App\Models\Farm;
use App\Models\Harvest;
use App\Models\Farmer;
use Illuminate\Http\Request;

class HarvestController extends Controller
{
    public function index()
    {
        $farmers = Farmer::all();
        $cooperatives = Cooperative::all();
        $farms = Farm::all();
        $harvests = Harvest::with('farmer')->get();
        return view('admin.harvests.index', compact('harvests', 'farmers', 'cooperatives', 'farms'));
    }

    public function create()
    {
        return view('harvests.create', ['farmers' => Farmer::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cooperative_id' => 'required|exists:cooperatives,id',
            'farm_id' => 'required|exists:farmers,id',
            'harvest_name' => 'required|string|max:255',
            'harvest_type' => 'required|string|max:255',
            'farmer_id' => 'required|exists:farmers,id',
            'harvest_date' => 'required|date',
            'coffee_grade' => 'nullable|string',
            'quantity' => 'required|numeric',
        ]);

        Harvest::create($request->all());
        return redirect()->route('harvests.index');
    }

    public function show(Harvest $harvest)
    {
        return view('harvests.show', compact('harvest'));
    }

    public function edit(Harvest $harvest)
    {
        return view('harvests.edit', ['harvest' => $harvest, 'farmers' => Farmer::all()]);
    }

    public function update(Request $request, Harvest $harvest)
    {
        $request->validate([
            'cooperative_id' => 'required|exists:cooperatives,id',
            'farm_id' => 'required|exists:farmers,id',
            'harvest_name' => 'required|string|max:255',
            'harvest_type' => 'required|string|max:255',
            'farmer_id' => 'required|exists:farmers,id',
            'harvest_date' => 'required|date',
            'coffee_grade' => 'nullable|string',
            'quantity' => 'required|numeric',
        ]);

        $harvest->update($request->all());
        return redirect()->route('harvests.index');
    }

    public function destroy(Harvest $harvest)
    {
        $harvest->delete();
        return redirect()->route('harvests.index');
    }
}
