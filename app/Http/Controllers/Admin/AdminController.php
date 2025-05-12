<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeTip;
use App\Models\Cooperative;
use App\Models\Farmer;
use App\Models\Harvest;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $farmersCount = Farmer::count();
        $harvestsCount = Harvest::count();
        $cooperativesCount = Cooperative::count();
        $paymentsCount = Payment::count();

        // Use a single cooperative, e.g. the first one
        $cooperative = Cooperative::with(['members', 'coffeeProducts', 'farms', 'harvests'])->first();

        if ($cooperative) {
            $membersCount = $cooperative->members()->count();
            $productsCount = $cooperative->coffeeProducts()->count();
            $farmsCount = $cooperative->farms()->count();
            $coffeeTipsCount = CoffeeTip::where('user_id', $cooperative->id)->count();
            $latestCoffeeTips = CoffeeTip::where('user_id', $cooperative->id)->latest()->take(5)->get();
            $latestProducts = $cooperative->coffeeProducts()->latest()->take(5)->get();
            $latestMembers = $cooperative->members()->latest()->take(5)->get();
            $latestFarms = $cooperative->farms()->latest()->take(5)->get();
            $latestHarvests = $cooperative->harvests()->latest()->take(5)->get();

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
        }

        return view('admin.dashboard.index', compact(
            'farmersCount',
            'harvestsCount',
            'cooperativesCount',
            'paymentsCount',
            'membersCount',
            'productsCount',
            'farmsCount',
            'coffeeTipsCount',
            'latestCoffeeTips',
            'latestProducts',
            'latestMembers',
            'latestFarms',
            'latestHarvests',
            'months',
            'totals',
            'cooperative',
        ));
    }
}
