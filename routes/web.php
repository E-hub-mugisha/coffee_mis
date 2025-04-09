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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PurchaseOrderController;
use App\Models\CoffeeOrder;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/coffee-products', [HomeController::class, 'coffeeProduct'])->name('coffee.products');
Route::get('/coffee-products/{id}', [HomeController::class, 'showCoffeeProduct'])->name('coffee.product.show');

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [HomeController::class, 'showCart'])->name('cart.show');
    Route::post('cart/{productId}', [HomeController::class, 'addToCart'])->name('cart.add');
    Route::delete('cart/{productId}', [HomeController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('cart/clear', [HomeController::class, 'clearCart'])->name('cart.clear');
    Route::post('cart/checkout', [HomeController::class, 'checkout'])->name('cart.checkout');

    Route::post('/checkout', [HomeController::class, 'placeOrder'])->name('checkout');
    Route::get('/order-success/{order}', function (CoffeeOrder $order) {
        return view('front-pages.order_success', compact('order'));
    })->name('order.success');
    Route::get('/invoice/download/{orderId}', [HomeController::class, 'downloadInvoice'])->name('invoice.download');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('purchase_orders', \App\Http\Controllers\PurchaseOrderController::class)->only(['index', 'create', 'store']);
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
    Route::get('/admin/farmers', [FarmerController::class, 'index'])->name('admin.farmers.index');
    Route::get('/admin/farmers/create', [FarmerController::class, 'create'])->name('farmers.create');
    Route::post('/admin/farmers', [FarmerController::class, 'store'])->name('farmers.store');
    Route::get('/admin/farmers/{farmer}', [FarmerController::class, 'show'])->name('farmers.show');
    Route::get('/admin/farmers/{farmer}/edit', [FarmerController::class, 'edit'])->name('farmers.edit');
    Route::put('/admin/farmers/{farmer}', [FarmerController::class, 'update'])->name('farmers.update');
    Route::delete('/admin/farmers/{farmer}', [FarmerController::class, 'destroy'])->name('farmers.destroy');


    // Harvests Routes
    Route::get('/admin/harvests', [HarvestController::class, 'index'])->name('admin.harvests.index');
    Route::get('/admin/harvests/create', [HarvestController::class, 'create'])->name('harvests.create');
    Route::post('/admin/harvests', [HarvestController::class, 'store'])->name('harvests.store');
    Route::get('/admin/harvests/{harvest}', [HarvestController::class, 'show'])->name('harvests.show');
    Route::get('/admin/harvests/{harvest}/edit', [HarvestController::class, 'edit'])->name('harvests.edit');
    Route::put('/admin/harvests/{harvest}', [HarvestController::class, 'update'])->name('harvests.update');
    Route::delete('/admin/harvests/{harvest}', [HarvestController::class, 'destroy'])->name('harvests.destroy');


    // Farms Routes
    Route::get('/admin/farms', [FarmController::class, 'index'])->name('admin.farms.index');
    Route::get('/admin/farms/create', [FarmController::class, 'create'])->name('farms.create');
    Route::post('/admin/farms', [FarmController::class, 'store'])->name('farms.store');
    Route::get('/admin/farms/{farm}', [FarmController::class, 'show'])->name('farms.show');
    Route::get('/admin/farms/{farm}/edit', [FarmController::class, 'edit'])->name('farms.edit');
    Route::put('/admin/farms/{farm}', [FarmController::class, 'update'])->name('farms.update');
    Route::delete('/admin/farms/{farm}', [FarmController::class, 'destroy'])->name('farms.destroy');


    // Transactions Routes
    Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::get('/admin/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/admin/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/admin/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::get('/admin/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/admin/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/admin/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');


    // Payments Routes
    Route::get('/admin/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/admin/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/admin/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/admin/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/admin/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/admin/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/admin/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');


    // Cooperatives Routes
    Route::get('/admin/cooperatives', [CooperativeController::class, 'index'])->name('admin.cooperatives.index');
    Route::get('/admin/cooperatives/create', [CooperativeController::class, 'create'])->name('cooperatives.create');
    Route::post('/admin/cooperatives', [CooperativeController::class, 'store'])->name('cooperatives.store');
    Route::get('/admin/cooperatives/{cooperative}', [CooperativeController::class, 'show'])->name('cooperatives.show');
    Route::get('/admin/cooperatives/{cooperative}/edit', [CooperativeController::class, 'edit'])->name('cooperatives.edit');
    Route::put('/admin/cooperatives/{cooperative}', [CooperativeController::class, 'update'])->name('cooperatives.update');
    Route::delete('/admin/cooperatives/{cooperative}', [CooperativeController::class, 'destroy'])->name('cooperatives.destroy');

    // Orders Routes
    Route::get('/admin/orders', [PurchaseOrderController::class, 'AdminOrders'])->name('admin.orders.index');
    Route::get('/admin/orders/{order}', [PurchaseOrderController::class, 'showOrder'])->name('admin.orders.show');
    Route::post('/admin/orders/{order}/status', [PurchaseOrderController::class, 'updateStatusOrder'])->name('admin.orders.updateStatus');
    Route::get('/admin/orders/{order}/invoice', [PurchaseOrderController::class, 'generateInvoice'])->name('admin.orders.invoice');
});

Route::middleware(['auth', 'role:cooperative'])->group(function () {
    Route::get('/cooperative/dashboard', [CooperativeController::class, 'coopDashboard'])->name('cooperative.dashboard');
    Route::get('/cooperative/profile', [CooperativeController::class, 'coopProfile'])->name('cooperative.profile');
    Route::put('/cooperative/profile', [CooperativeController::class, 'updateCoop'])->name('cooperative.profile.update');

    // Members Routes
    Route::get('/cooperative/members', [MemberController::class, 'index'])->name('cooperative.members.index');
    Route::get('/cooperative/members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/cooperative/members', [MemberController::class, 'store'])->name('members.store');
    Route::get('/cooperative/members/{member}', [MemberController::class, 'show'])->name('members.show');
    Route::get('/cooperative/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/cooperative/members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('/cooperative/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    Route::get('/cooperative/members/{member}/deactivate', [MemberController::class, 'deactivate'])->name('members.deactivate');
    Route::put('/cooperative/members/{member}/activate', [MemberController::class, 'activate'])->name('members.activate');

    Route::get('/cooperatives/coffe_orders', [PurchaseOrderController::class, 'indexOrderCooperatives'])->name('cooperatives.coffee.orders');
    Route::get('/cooperatives/orders/{order}', [PurchaseOrderController::class, 'showOrderCooperative'])->name('cooperatives.orders.show');
    Route::post('/cooperatives/orders/{order}/status', [PurchaseOrderController::class, 'updateStatusOrder'])->name('cooperatives.orders.updateStatus');
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
