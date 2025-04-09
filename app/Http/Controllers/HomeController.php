<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CoffeeOrder;
use App\Models\CoffeeOrderItem;
use App\Models\CoffeeProduct;
use App\Models\CoffeeTip;
use App\Models\Harvest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $coffeeTips = CoffeeTip::inRandomOrder()
            ->with('user')
            ->take(4)
            ->get();

        $coffeeProducts = CoffeeProduct::all()->take(6);
        return view('front-pages.index', compact('coffeeTips', 'coffeeProducts'));
    }
    public function coffeeProduct()
    {
        $coffeeProducts = CoffeeProduct::all();
        return view('front-pages.coffee_products', compact('coffeeProducts'));
    }
    public function showCoffeeProduct($id)
    {
        $coffeeProduct = CoffeeProduct::findOrFail($id);
        return view('front-pages.coffee_product_detail', compact('coffeeProduct'));
    }

    // Show the cart page
    public function showCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('front-pages.cart_index', compact('cartItems'));
    }

    // Add a product to the cart
    public function addToCart(Request $request, $productId)
    {
        $product = CoffeeProduct::find($productId);

        // If the product doesn't exist, return to the previous page with an error
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // If the user is not logged in, prompt to login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to your cart');
        }

        // Check if the product already exists in the user's cart
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('coffee_product_id', $productId)
            ->first();

        if ($cartItem) {
            // If the product is already in the cart, increase the quantity
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->total = $cartItem->quantity * $product->price;
            $cartItem->save();
        } else {
            // Otherwise, create a new cart item
            Cart::create([
                'user_id' => Auth::id(),
                'coffee_product_id' => $productId,
                'quantity' => $request->input('quantity', 1),
                'total' => $product->price * $request->input('quantity', 1),
            ]);
        }

        return redirect()->route('cart.show')->with('success', 'Product added to cart');
    }

    public function placeOrder()
    {
        $user = Auth::User();
        $cartItems = Cart::with('coffeeProduct')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        DB::beginTransaction();

        try {
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item->coffeeProduct->price * $item->quantity;
            }

            $order = CoffeeOrder::create([
                'user_id' => $user->id,
                'total_amount' => $total
            ]);

            foreach ($cartItems as $item) {
                CoffeeOrderItem::create([
                    'order_id' => $order->id,
                    'coffee_product_id' => $item->coffeeProduct->id,
                    'quantity' => $item->quantity,
                    'price' => $item->coffeeProduct->price,
                    'total' => $item->coffeeProduct->price * $item->quantity,
                ]);
            }

            // Empty the cart after successful order
            Cart::where('user_id', $user->id)->delete();

            DB::commit();

            return redirect()->route('order.success', $order->id)->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }

    public function downloadInvoice($orderId)
    {
        $order = CoffeeOrder::with('orderItems.coffeeProduct')->findOrFail($orderId);

        $pdf = Pdf::loadView('pdf.order-invoice', compact('order'));

        // Download the invoice
        $pdf->download('invoice_order_' . $order->id . '.pdf');

        // Redirect to home page after download
        return redirect()->route('home')->with('success', 'Invoice downloaded successfully!');
    }

    // Remove a product from the cart
    public function removeFromCart($productId)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('coffee_product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.show')->with('success', 'Product removed from cart');
    }

    // Clear the cart
    public function clearCart()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.show')->with('success', 'Cart has been cleared');
    }

    // Checkout (empty the cart after purchase)
    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty');
        }

        // Perform any necessary order processing logic here

        // Empty the cart after successful checkout
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.show')->with('success', 'Checkout successful, your cart is empty now');
    }

    public function purchaseCoffee($id)
    {
        $coffeeProduct = CoffeeProduct::findOrFail($id);
        return view('front-pages.purchase_form');
    }
    public function show($id)
    {
        $coffeeProduct = CoffeeProduct::findOrFail($id);
        return view('purchase.show', compact('coffeeProduct'));
    }

    public function purchase(Request $request, $id)
    {
        $coffeeProduct = CoffeeProduct::findOrFail($id);

        // Validate the quantity
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $coffeeProduct->quantity,
        ]);

        $quantity = $request->input('quantity');
        $totalPrice = $coffeeProduct->price * $quantity;

        // Create a new order
        $order = CoffeeOrder::create([
            'user_id' => Auth::id(),
            'total_amount' => $totalPrice,
            'status' => 'pending',  // You can change this to 'completed' after payment
        ]);

        // Create the order item
        CoffeeOrderItem::create([
            'order_id' => $order->id,
            'coffee_product_id' => $coffeeProduct->id,
            'quantity' => $quantity,
            'price' => $coffeeProduct->price,
            'total' => $totalPrice,
        ]);

        // Decrease the stock quantity of the coffee product
        $coffeeProduct->decrement('quantity', $quantity);

        return redirect()->route('orders.show', $order->id)->with('success', 'Purchase successful!');
    }
}
