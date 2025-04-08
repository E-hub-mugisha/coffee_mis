<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments', 'transactions'));
    }

    public function create()
    {
        return view('payments.create', ['transactions' => Transaction::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'amount_paid' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
        ]);

        Payment::create($request->all());
        return redirect()->route('payments.index');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', ['payment' => $payment, 'transactions' => Transaction::all()]);
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount_paid' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
        ]);

        $payment->update($request->all());
        return redirect()->route('payments.index');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
