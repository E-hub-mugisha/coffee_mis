<?php

namespace App\Http\Controllers;

use App\Models\CoffeeTip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoffeeTipsController extends Controller
{
    public function index()
    {
        $tips = CoffeeTip::all();
        return view('cooperatives.coffee-tips', compact('tips'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'season' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/coffee-tips/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $tips['image'] = "$profileImage";
        }
        $tips = new CoffeeTip();
        $tips->user_id = Auth::user()->id;
        $tips->title = $request->title;
        $tips->content = $request->content;
        $tips->season = $request->season;
        $tips->category = $request->category;
        $tips->image = $profileImage;
        $tips->save();

        return redirect()->back()->with('success', 'Coffee Tips added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'season' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/coffee-tips/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $tips['image'] = "$profileImage";
        }

        $tips = CoffeeTip::findOrFail($id);

        $tips->user_id = Auth::user()->id;
        $tips->title = $request->title;
        $tips->content = $request->content;
        $tips->season = $request->season;
        $tips->category = $request->category;
        $tips->image = $profileImage;
        $tips->save();

        return redirect()->back()->with('success', 'Coffee tip updated successfully.');
    }

    public function destroy($id)
    {
        $tips = CoffeeTip::findOrFail($id);
        $tips->delete();

        return redirect()->back()->with('success', 'Coffee tip deleted successfully.');
    }
}
