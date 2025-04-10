<?php

namespace App\Http\Controllers;

use App\Models\CoffeeProduct;
use App\Models\Cooperative;
use App\Models\Farm;
use App\Models\Farmer;
use App\Models\Harvest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoffeeProductController extends Controller
{
    public function index()
    {
        $cooperatives = Cooperative::all();
        $products = CoffeeProduct::all();
        
        $harvests = Harvest::all();
        return view('cooperatives.coffee-products', compact('products', 'harvests', 'cooperatives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'harvest_id' => 'required|exists:harvests,id',
            'cooperative_id' => 'required|exists:cooperatives,id',
        ]);

        CoffeeProduct::create($request->all());

        return redirect()->back()->with('success', 'Coffee product added successfully.');
    }

    public function update(Request $request, CoffeeProduct $coffeeProduct)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'harvest_id' => 'required|exists:harvests,id',
            'cooperative_id' => 'required|exists:cooperatives,id',
        ]);

        $coffeeProduct->update($request->all());

        return redirect()->back()->with('success', 'Coffee product updated successfully.');
    }

    public function destroy(CoffeeProduct $coffeeProduct)
    {
        $coffeeProduct->delete();

        return redirect()->back()->with('success', 'Coffee product deleted successfully.');
    }
}
