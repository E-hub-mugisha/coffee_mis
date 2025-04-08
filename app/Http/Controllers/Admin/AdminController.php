<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cooperative;
use App\Models\Farmer;
use App\Models\Harvest;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $farmersCount = Farmer::count();
        $harvestsCount = Harvest::count();
        $cooperativesCount = Cooperative::count();
        $paymentsCount = Payment::count();

        return view('admin.dashboard.index', compact('farmersCount', 'harvestsCount', 'cooperativesCount', 'paymentsCount'));
    }
}
