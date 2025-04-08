@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Transactions</h1>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransactionModal">Add Transaction</button>

    <table class="table table-bordered mt-3" id="transactionsTable">
        <thead>
            <tr>
                <th>Cooperative</th>
                <th>Farmer</th>
                <th>Amount</th>
                <th>transaction Date</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr id="transaction-{{ $transaction->id }}">
                <td>{{ $transaction->cooperative->name }}</td>
                <td>{{ $transaction->farmer->name }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>{{ $transaction->type }}</td>
                <td>
                    <!-- Show Transaction Modal Trigger -->
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showTransactionModal{{ $transaction->id }}">Show</button>

                    <!-- Edit Transaction Modal Trigger -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTransactionModal{{ $transaction->id }}">Edit</button>

                    <!-- Delete Transaction Form -->
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Show Transaction Modal -->
            <div class="modal fade" id="showTransactionModal{{ $transaction->id }}" tabindex="-1" aria-labelledby="showTransactionModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showTransactionModalLabel">Transaction Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Cooperative:</strong> {{ $transaction->cooperative->name }}</p>
                            <p><strong>Farmer:</strong> {{ $transaction->farmer->name }}</p>
                            <p><strong>Amount:</strong> {{ $transaction->amount }}</p>
                            <p><strong>transaction Date:</strong> {{ $transaction->transaction_date }}</p>
                            <p><strong>Type:</strong> {{ $transaction->type }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Transaction Modal -->
            <div class="modal fade" id="editTransactionModal{{ $transaction->id }}" tabindex="-1" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editTransactionModalLabel">Edit Transaction</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="cooperative_id" class="form-label">Cooperative</label>
                                    <select class="form-control" id="cooperative_id" name="cooperative_id" required>
                                        @foreach($cooperatives as $cooperative)
                                        <option value="{{ $cooperative->id }}" {{ $cooperative->id == $transaction->cooperative_id ? 'selected' : '' }}>{{ $cooperative->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="farmer_id" class="form-label">Farm</label>
                                    <select class="form-control" id="farmer_id" name="farmer_id" required>
                                        @foreach($farmers as $farmer)
                                        <option value="{{ $farmer->id }}" {{ $farmer->id == $transaction->farmer_id ? 'selected' : '' }}>{{ $farmer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="sale" {{ $transaction->type == 'sale' ? 'selected' : '' }}>Sale</option>
                                        <option value="payment" {{ $transaction->type == 'payment' ? 'selected' : '' }}>Payment</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" value="{{ $transaction->amount }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="transaction_date" class="form-label">transaction_Date</label>
                                    <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="{{ $transaction->transaction_date }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Transaction Modal -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('transactions.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionModalLabel">Add Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cooperative_id" class="form-label">Cooperative</label>
                        <select class="form-control" id="cooperative_id" name="cooperative_id" required>
                            @foreach($cooperatives as $cooperative)
                            <option value="{{ $cooperative->id }}">{{ $cooperative->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="farmer_id" class="form-label">Farmer</label>
                        <select class="form-control" id="farmer_id" name="farmer_id" required>
                            @foreach($farmers as $farmer)
                            <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="sale">Sale</option>
                            <option value="payment">payment</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="transaction_date" class="form-label">transaction_Date</label>
                        <input type="date" class="form-control" id="transaction_date" name="transaction_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Include DataTables CSS and JS in your Blade view -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#transactionsTable').DataTable({
            "order": [[ 0, "asc" ]],  // Order by the first column (Farm) ascending
            "pageLength": 10,         // Show 10 entries per page
            "responsive": true,       // Make the table responsive
            "autoWidth": false        // Disable automatic width calculation
        });
    });
</script>

@endsection