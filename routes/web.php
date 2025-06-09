<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Buyer\DashboardController;
use App\Http\Controllers\CoffeeProductController;
use App\Http\Controllers\CoffeeTipsController;
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
Route::get('/contact_us', [HomeController::class, 'contact'])->name('contact');
Route::get('/coffee-tips', [HomeController::class, 'coffeeTips'])->name('coffee-tips');
Route::get('/coffee-tips/detail/{id}', [HomeController::class, 'coffeeTipsDetail'])->name('coffee-tips-detail');
Route::get('/coffee_products', [HomeController::class, 'coffeeProduct'])->name('coffee.products');
Route::get('/coffee_products/{id}', [HomeController::class, 'showCoffeeProduct'])->name('coffee.product.show');

Route::get('/get/cooperatives', [CooperativeController::class, 'cooperatives'])->name('front.cooperatives');
Route::get('/get/cooperatives/{id}', [CooperativeController::class, 'showCooperative'])->name('front.cooperative.detail');
Route::get('/get/cooperatives/{id}/products', [CooperativeController::class, 'showCooperativeProducts'])->name('front.cooperative.products');
Route::get('/get/cooperatives/{id}/members', [CooperativeController::class, 'showCooperativeMembers'])->name('front.cooperative.members');
Route::get('/get/cooperatives/{id}/tips', [CooperativeController::class, 'showCooperativeTips'])->name('front.cooperative.tips');

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

    Route::get('/checkout/{order}', [HomeController::class, 'checkoutOrder'])->name('payment.checkout');

    Route::post('cooperative/feedback', [CooperativeController::class, 'cooperativeFeedback'])->name('cooperative.feedback.store');
});

Route::get('/payment/callback', [HomeController::class, 'handleCallback'])->name('payment.callback');



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
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Farmers Routes
    Route::get('/admin/farmers', [FarmerController::class, 'index'])->name('admin.farmers.index');
    Route::get('/admin/farmers/create', [FarmerController::class, 'create'])->name('farmers.create');
    Route::post('/admin/farmers', [FarmerController::class, 'store'])->name('farmers.store');
    Route::get('/admin/farmers/{farmer}', [FarmerController::class, 'show'])->name('farmers.show');
    Route::get('/admin/farmers/{farmer}/edit', [FarmerController::class, 'edit'])->name('farmers.edit');
    Route::put('/admin/farmers/{farmer}', [FarmerController::class, 'update'])->name('farmers.update');
    Route::delete('/admin/farmers/{farmer}', [FarmerController::class, 'destroy'])->name('farmers.destroy');


    // Harvests Routes
    Route::get('/admin/harvests', [App\Http\Controllers\Admin\AdminHarvestController::class, 'index'])->name('admin.harvests.index');
    Route::get('/admin/harvests/create', [App\Http\Controllers\Admin\AdminHarvestController::class, 'create'])->name('admin.harvests.create');
    Route::post('/admin/harvests', [App\Http\Controllers\Admin\AdminHarvestController::class, 'store'])->name('admin.harvests.store');
    Route::get('/admin/harvests/{harvest}', [App\Http\Controllers\Admin\AdminHarvestController::class, 'show'])->name('admin.harvests.show');
    Route::get('/admin/harvests/{harvest}/edit', [App\Http\Controllers\Admin\AdminHarvestController::class, 'edit'])->name('admin.harvests.edit');
    Route::put('/admin/harvests/{harvest}', [App\Http\Controllers\Admin\AdminHarvestController::class, 'update'])->name('admin.harvests.update');
    Route::delete('/admin/harvests/{harvest}', [App\Http\Controllers\Admin\AdminHarvestController::class, 'destroy'])->name('admin.harvests.destroy');


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
    Route::get('/invoice/download/{orderId}', [PurchaseOrderController::class, 'downloadInvoice'])->name('invoice.download');
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
    Route::get('/invoice/download/{orderId}', [PurchaseOrderController::class, 'downloadInvoice'])->name('invoice.download');
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

    // Coffee Products Routes
    Route::resource('/coffee-products', CoffeeProductController::class);

    // Coffee Tips Routes
    Route::get('/coffee/tips', [CoffeeTipsController::class, 'index'])->name('coop.coffee-tips');
    Route::post('/coffee/tips', [CoffeeTipsController::class, 'store'])->name('coop.coffee-tips.store');
    Route::get('/coffee/tips/{id}', [CoffeeTipsController::class, 'show'])->name('coop.coffee-tips.show');
    Route::put('/coffee/tips/{id}', [CoffeeTipsController::class, 'update'])->name('coop.coffee-tips.update');
    Route::delete('/coffee/tips/{id}', [CoffeeTipsController::class, 'destroy'])->name('coop.coffee-tips.destroy');

    // Coffee Products feedback Routes
    Route::get('/cooperative/products/feedback', [CooperativeController::class, 'feedback'])->name('cooperatives.coffee.feedback');
});

// Buyer Dashboard Routes
Route::middleware(['auth', 'role:buyer'])->group(function () {
    Route::get('/coffee/buyer/dashboard', [\App\Http\Controllers\Buyer\DashboardController::class, 'index'])->name('coffee.buyer.dashboard');
    Route::get('/coffee/buyer/orders', [\App\Http\Controllers\Buyer\DashboardController::class, 'orders'])->name('buyer.orders');
    Route::get('/coffee/buyer/orders/{id}', [\App\Http\Controllers\Buyer\DashboardController::class, 'showOrder'])->name('buyer.orders.show');
    Route::get('/coffee/buyer/tracking/{id}', [\App\Http\Controllers\Buyer\DashboardController::class, 'track'])->name('buyer.tracking');
    Route::get('/coffee/buyer/payments', [\App\Http\Controllers\Buyer\DashboardController::class, 'payments'])->name('buyer.payments');
    Route::get('/coffee/buyer/feedback', [\App\Http\Controllers\Buyer\DashboardController::class, 'feedback'])->name('buyer.feedback');
    Route::post('/coffee/buyer/feedback', [\App\Http\Controllers\Buyer\DashboardController::class, 'createFeedback'])->name('buyer.feedback.create');
    Route::delete('/coffee/buyer/feedback/{id}', [\App\Http\Controllers\Buyer\DashboardController::class, 'deleteFeedback'])->name('buyer.feedback.delete');
    Route::get('/coffee/buyer/profile', [\App\Http\Controllers\Buyer\DashboardController::class, 'profile'])->name('buyer.profile');
    Route::get('/coffee/buyer/product', [\App\Http\Controllers\Buyer\DashboardController::class, 'products'])->name('buyer.products');
});

require __DIR__ . '/auth.php';
