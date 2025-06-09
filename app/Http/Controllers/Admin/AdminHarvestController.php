<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cooperative;
use App\Models\Farm;
use App\Models\Farmer;
use App\Models\Harvest;
use Illuminate\Http\Request;

class AdminHarvestController extends Controller
{
    public function index()
    {
        $harvests = Harvest::with(['farmer', 'cooperative', 'farm'])->latest()->get();
        $farmers = Farmer::all();
        $cooperatives = Cooperative::all();
        $farms = Farm::all();

        return view('admin.harvests.index', compact('harvests', 'farmers', 'cooperatives', 'farms'));
    }

    public function create()
    {
        return view('admin.harvests.create', [
            'farmers' => Farmer::all(),
            'cooperatives' => Cooperative::all(),
            'farms' => Farm::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cooperative_id' => 'required|exists:cooperatives,id',
            'farm_id' => 'required|exists:farms,id',
            'farmer_id' => 'required|exists:farmers,id',
            'harvest_name' => 'required|string|max:255',
            'harvest_type' => 'required|string|max:255',
            'harvest_date' => 'required|date',
            'coffee_grade' => 'nullable|string|max:255',
            'quantity' => 'required|numeric|min:0',
        ]);

        Harvest::create($request->all());

        return redirect()->back()->with('success', 'Harvest created successfully.');
    }

    public function show(Harvest $harvest)
    {
        $harvest->load(['farmer', 'cooperative', 'farm']);
        return view('admin.harvests.show', compact('harvest'));
    }

    public function edit(Harvest $harvest)
    {
        return view('admin.harvests.edit', [
            'harvest' => $harvest,
            'farmers' => Farmer::all(),
            'cooperatives' => Cooperative::all(),
            'farms' => Farm::all(),
        ]);
    }

    public function update(Request $request, Harvest $harvest)
    {
        $request->validate([
            'cooperative_id' => 'required|exists:cooperatives,id',
            'farm_id' => 'required|exists:farms,id',
            'farmer_id' => 'required|exists:farmers,id',
            'harvest_name' => 'required|string|max:255',
            'harvest_type' => 'required|string|max:255',
            'harvest_date' => 'required|date',
            'coffee_grade' => 'nullable|string|max:255',
            'quantity' => 'required|numeric|min:0',
        ]);

        $harvest->update($request->all());

        return redirect()->back()->with('success', 'Harvest updated successfully.');
    }

    public function destroy(Harvest $harvest)
    {
        $harvest->delete();
        return redirect()->back()->with('success', 'Harvest deleted successfully.');
    }
}
