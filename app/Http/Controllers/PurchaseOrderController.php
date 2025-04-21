<?php

namespace App\Http\Controllers;

use App\Models\CoffeeOrder;
use App\Models\CoffeePurchaseOrder;
use App\Models\Harvest;
use App\Models\PurchaseOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseOrderController extends Controller
{
    public function indexOrderCooperatives()
    {
        // Fetch orders for the admin, you can modify this query to filter orders based on some criteria
        $orders = CoffeeOrder::all();

        // Pass the orders to the admin view
        return view('cooperatives.orders_index', compact('orders'));
    }

    public function updateStatusOrder(Request $request, CoffeeOrder $order)
    {
        // Update the order status
        $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Order status updated successfully.');
    }


    public function AdminOrders()
    {
        $orders = CoffeeOrder::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coffee_id' => 'required|exists:coffees,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $coffee = Harvest::findOrFail($request->coffee_id);

        PurchaseOrder::create([
            'buyer_id' => Auth::id(),
            'coffee_id' => $coffee->id,
            'quantity' => $request->quantity,
            'price' => $coffee->unit_price * $request->quantity,
            'order_date' => now(),
        ]);

        return redirect()->route('purchase_orders.index')->with('success', 'Order placed successfully.');
    }
    public function downloadInvoice($orderId)
    {
        $order = CoffeeOrder::with('orderItems.coffeeProduct')->findOrFail($orderId);

        $pdf = Pdf::loadView('pdf.order-invoice', compact('order'));

        // Download the invoice
        $pdf->download('invoice_order_' . $order->id . '.pdf');

        // Redirect to home page after download
        return redirect()->back()->with('success', 'Invoice downloaded successfully!');
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'coffee_id' => 'required|exists:coffees,id',
            'quantity' => 'required|integer|min:1', 
            'delivery_address' => 'required|string',
        ]);

        // Create the order record
        $order = new CoffeePurchaseOrder();
        $order->buyer_id = Auth::user()->id;
        $order->cooperative_id = $request->cooperative_id;
        $order->status = 'pending';
        $order->total_price = 0; // Will be calculated below
        $order->save();

        // Loop through products and store them in the pivot table
        $totalPrice = 0;
        foreach ($request->products as $product) {
            $productData = Product::find($product['product_id']);
            $totalPrice += $productData->price * $product['quantity'];

            $order->products()->attach($product['product_id'], [
                'quantity' => $product['quantity'],
                'price' => $productData->price
            ]);
        }

        // Update the order with the total price
        $order->total_price = $totalPrice;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully');
    }
}
