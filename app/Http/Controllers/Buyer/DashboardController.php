<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CoffeeOrder;
use App\Models\CoffeeOrderItem;
use App\Models\CoffeeProduct;
use App\Models\Payment;
use App\Models\UserFeedback;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orderCount = CoffeeOrder::where('user_id', $user->id)->count();
        $totalSpent = CoffeeOrder::where('user_id', $user->id)->sum('total_amount');
        $feedbacksCount = UserFeedback::where('user_id', $user->id)->count();

        $buyerId = Auth::id();

        $orders = CoffeeOrder::where('user_id', $buyerId)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = $orders->pluck('date');
        $totals = $orders->pluck('total');

        // Top purchased products
        $topProducts = CoffeeOrderItem::with('coffeeProduct')
            ->whereHas('order', fn($q) => $q->where('user_id', $buyerId))
            ->selectRaw('coffee_product_id, SUM(quantity) as total_quantity')
            ->groupBy('coffee_product_id')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->get();

        $productNames = $topProducts->map(fn($item) => $item->coffeeProduct->name);
        $productQuantities = $topProducts->pluck('total_quantity');

        // Monthly spending
        $monthlySpending = CoffeeOrder::where('user_id', $buyerId)
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total_amount) as total_spent')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = $monthlySpending->pluck('month');
        $spending = $monthlySpending->pluck('total_spent');

        // Product Ratings
        $ratings = UserFeedback::whereHas('coffeeProduct.orderItems.order', fn($q) => $q->where('user_id', $buyerId))
            ->selectRaw('rating, COUNT(*) as count')
            ->groupBy('rating')
            ->get();

        $ratingLabels = $ratings->pluck('rating');
        $ratingCounts = $ratings->pluck('count');
        return view('buyer.dashboard', compact('orderCount', 'totalSpent', 'feedbacksCount', 'dates', 'totals', 'productNames', 'productQuantities', 'months', 'spending', 'ratingLabels', 'ratingCounts'));
    }

    public function orders()
    {
        $orders = CoffeeOrder::where('user_id', Auth::id())->latest()->get();
        return view('buyer.orders', compact('orders'));
    }

    public function showOrder($id)
    {
        $order = CoffeeOrder::with('items.product')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('buyer.order-detail', compact('order'));
    }

    public function track($orderId)
    {
        $order = CoffeeOrder::where('id', $orderId)->where('user_id', Auth::id())->firstOrFail();
        // Assuming delivery_status or tracking_status is a field
        return view('buyer.track', compact('order'));
    }

    public function payments()
    {
        $payments = Payment::where('user_id', Auth::id())->latest()->get();
        return view('buyer.payments', compact('payments'));
    }

    public function feedback()
    {
        $feedbacks = UserFeedback::where('user_id', Auth::id())->latest()->get();
        $products = CoffeeProduct::all(); // Assuming you want to show all products for feedback
        return view('buyer.feedback', compact('feedbacks', 'products'));
    }
    public function createFeedback(Request $request)
    {
        $request->validate([
            'coffee_product_id' => 'required|exists:coffee_products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        UserFeedback::create([
            'user_id' => Auth::id(),
            'coffee_product_id' => $request->coffee_product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }
    public function deleteFeedback($id)
    {
        $feedback = UserFeedback::findOrFail($id);
        $feedback->delete();

        return redirect()->back()->with('success', 'Feedback deleted successfully.');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('buyer.profile', compact('user'));
    }
    public function products()
    {
        $products = CoffeeProduct::with('cooperative')->latest()->get();
        return view('buyer.coffee-products', compact('products'));
    }
}
