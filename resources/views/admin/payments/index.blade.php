@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Payments</h1>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">Add Payment</button>

    <table class="table table-bordered mt-3" id="paymentsTable">
        <thead>
            <tr>
                <th>Transaction</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
                <th>Payment Method</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr id="payment-{{ $payment->id }}">
                <td>{{ $payment->transaction->type }}</td>
                <td>{{ $payment->amount_paid }}</td>
                <td>{{ $payment->payment_date }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>
                    <!-- Show Payment Modal Trigger -->
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showPaymentModal{{ $payment->id }}">Show</button>

                    <!-- Edit Payment Modal Trigger -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPaymentModal{{ $payment->id }}">Edit</button>

                    <!-- Delete Payment Form -->
                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this payment?')">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Show Payment Modal -->
            <div class="modal fade" id="showPaymentModal{{ $payment->id }}" tabindex="-1" aria-labelledby="showPaymentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showPaymentModalLabel">Payment Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Transaction:</strong> {{ $payment->transaction->type }}</p>
                            <p><strong>Payment Method:</strong> {{ $payment->payment_method }}</p>
                            <p><strong>Amount Paid:</strong> {{ $payment->amount_paid }}</p>
                            <p><strong>Payment Date:</strong> {{ $payment->payment_date }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Payment Modal -->
            <div class="modal fade" id="editPaymentModal{{ $payment->id }}" tabindex="-1" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('payments.update', $payment->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPaymentModalLabel">Edit Payment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="transaction_id" class="form-label">transaction</label>
                                    <select class="form-control" id="transaction_id" name="transaction_id" required>
                                        @foreach($transactions as $transaction)
                                        <option value="{{ $transaction->id }}" {{ $transaction->id == $payment->transaction_id ? 'selected' : '' }}>{{ $transaction->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="amount_paid" class="form-label">Amount_paid</label>
                                    <input type="number" class="form-control" id="amount_paid" name="amount_paid" value="{{ $payment->amount_paid }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="payment_date" class="form-label">Payment Date</label>
                                    <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $payment->payment_date }}" required>
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

<!-- Add Payment Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('payments.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentModalLabel">Add Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="transaction_id" class="form-label">transaction</label>
                        <select class="form-control" id="transaction_id" name="transaction_id" required>
                            @foreach($transactions as $transaction)
                            <option value="{{ $transaction->id }}">{{ $transaction->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount_paid" class="form-label">Amount_paid</label>
                        <input type="number" class="form-control" id="amount_paid" name="amount_paid" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Payment Date</label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Mobile Money">Mobile Money</option>
                        </select>
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

<!-- DataTables Initialization -->
<script>
    $(document).ready(function() {
        $('#paymentsTable').DataTable({
            "order": [
                [0, "asc"]
            ], // Order by the first column (Farmer) ascending
            "pageLength": 10, // Show 10 entries per page
            "responsive": true, // Make the table responsive
            "autoWidth": false // Disable automatic width calculation
        });
    });
</script>
@endsection
