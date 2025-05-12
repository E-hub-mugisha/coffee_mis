<?php

namespace App\Http\Controllers;

use App\Models\CoffeeProduct;
use App\Models\CoffeeTip;
use App\Models\Cooperative;
use App\Models\CooperativeFeedback;
use App\Models\User;
use App\Models\UserFeedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $cooperative = Cooperative::where('user_id', Auth::User()->id)->first();
        if (!$cooperative) {
            return redirect()->back()->with('error', 'Cooperative not found.');
        }
        $cooperative->load('members', 'coffeeProducts', 'farms');
        $cooperative->members_count = $cooperative->members()->count();
        $cooperative->products_count = $cooperative->coffeeProducts()->count();
        $cooperative->farms_count = $cooperative->farms()->count();
        $cooperative->coffee_tips_count = CoffeeTip::where('user_id', $cooperative->id)->count();
        $cooperative->coffee_tips = CoffeeTip::where('user_id', $cooperative->id)->latest()->take(5)->get();
        $cooperative->coffeeProducts = $cooperative->coffeeProducts()->latest()->take(5)->get();
        $cooperative->members = $cooperative->members()->latest()->take(5)->get();
        $cooperative->farms = $cooperative->farms()->latest()->take(5)->get();
        $cooperative->harvests = $cooperative->harvests()->latest()->take(5)->get();

        $monthlyHarvests = DB::table('harvests')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(quantity) as total'))
            ->whereYear('created_at', now()->year)
            ->where('cooperative_id', $cooperative->id)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month');

        $months = [];
        $totals = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = Carbon::create()->month($i)->format('M');
            $totals[] = $monthlyHarvests[$i] ?? 0;
        }
        return view('cooperatives.dashboard', compact('cooperative', 'months', 'totals'));
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
    public function cooperatives()
    {
        $cooperatives = Cooperative::simplePaginate(8);
        return view('front-pages.cooperatives', compact('cooperatives'));
    }
    public function showCooperative($id)
    {
        $cooperative = Cooperative::findOrFail($id);
        return view('front-pages.cooperative_detail', compact('cooperative'));
    }
    public function showCooperativeProducts($id)
    {
        $cooperative = Cooperative::findOrFail($id);
        $coffeeProducts = $cooperative->coffeeProducts()->simplePaginate(8);
        return view('front-pages.coffee_products', compact('cooperative', 'coffeeProducts'));
    }
    public function showCooperativeMembers($id)
    {
        $cooperative = Cooperative::findOrFail($id);
        return view('front-pages.cooperative_members', compact('cooperative'));
    }
    public function showCooperativeTips($id)
    {
        $cooperative = Cooperative::findOrFail($id);
        $coffeeTips = CoffeeTip::where('user_id', $cooperative->id)->get();
        return view('front-pages.cooperative_tips', compact('cooperative', 'coffeeTips'));
    }
    public function feedback()
    {
        $cooperative = Cooperative::where('user_id', Auth::id())->first();

        if (!$cooperative) {
            return redirect()->back()->with('error', 'Cooperative not found.');
        }

        $productIds = CoffeeProduct::where('cooperative_id', $cooperative->id)->pluck('id');

        $feedbacks = UserFeedback::whereIn('coffee_product_id', $productIds)
            ->with(['user', 'coffeeProduct'])
            ->latest()
            ->get();

        return view('cooperatives.feedback', compact('feedbacks'));
    }
    public function cooperativeFeedback(Request $request)
    {
        $request->validate([
            'cooperative_id' => 'required|exists:cooperatives,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        CooperativeFeedback::create([
            'user_id' => Auth::id(),
            'cooperative_id' => $request->cooperative_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }
}
