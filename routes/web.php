<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CooperativeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Farmers Routes
    Route::resource('farmers', FarmerController::class);

    // Harvests Routes
    Route::resource('harvests', HarvestController::class);

    // Farms Routes
    Route::resource('farms', FarmController::class);

    // Transactions Routes
    Route::resource('transactions', TransactionController::class);

    // Payments Routes
    Route::resource('payments', PaymentController::class);

    // Cooperatives Routes
    Route::resource('cooperatives', CooperativeController::class);
});

Route::middleware(['auth', 'role:cooperative'])->group(function () {
    Route::get('/cooperative/dashboard', [CooperativeController::class, 'coopDashboard'])->name('cooperative.dashboard');
    Route::get('/cooperative/profile', [CooperativeController::class, 'coopProfile'])->name('cooperative.profile');

    // Farmers Routes
    Route::resource('farmers', FarmerController::class);

    // Harvests Routes
    Route::resource('harvests', HarvestController::class);

    // Farms Routes
    Route::resource('farms', FarmController::class);

    // Transactions Routes
    Route::resource('transactions', TransactionController::class);

    // Payments Routes
    Route::resource('payments', PaymentController::class);

    // Cooperatives Routes
    Route::resource('cooperatives', CooperativeController::class);
});




require __DIR__ . '/auth.php';
