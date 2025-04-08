<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Farmer;
use App\Models\Cooperative;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $cooperatives = Cooperative::all();
        $farmers = Farmer::all();
        return view('admin.transactions.index', [
            'transactions' => Transaction::all(),
            'cooperatives' => $cooperatives,
            'farmers' => $farmers
        ]);
    }

    public function create()
    {
        return view('transactions.create', [
            'farmers' => Farmer::all(),
            'cooperatives' => Cooperative::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'farmer_id' => 'required|exists:farmers,id',
            'cooperative_id' => 'required|exists:cooperatives,id',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'type' => 'required|string|in:sale,payment',
        ]);

        Transaction::create($request->all());
        return redirect()->route('transactions.index');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', [
            'transaction' => $transaction,
            'farmers' => Farmer::all(),
            'cooperatives' => Cooperative::all()
        ]);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'type' => 'required|string|in:sale,payment',
        ]);

        $transaction->update($request->all());
        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index');
    }
}
