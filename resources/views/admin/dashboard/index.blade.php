@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-4">Admin Dashboard</h1>

        <div class="row">
            <!-- Stats Cards -->
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Farmers</h5>
                        <p class="card-text">{{ $farmersCount }} farmers</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Harvests</h5>
                        <p class="card-text">{{ $harvestsCount }} harvests</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Cooperatives</h5>
                        <p class="card-text">{{ $cooperativesCount }} cooperatives</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Payments</h5>
                        <p class="card-text">{{ $paymentsCount }} payments</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="my-4">
            <h3>Quick Access</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('farmers.index') }}">Manage Farmers</a></li>
                <li class="list-group-item"><a href="{{ route('harvests.index') }}">Manage Harvests</a></li>
                <li class="list-group-item"><a href="{{ route('cooperatives.index') }}">Manage Cooperatives</a></li>
                <li class="list-group-item"><a href="{{ route('transactions.index') }}">Manage Transactions</a></li>
                <li class="list-group-item"><a href="{{ route('payments.index') }}">Manage Payments</a></li>
            </ul>
        </div>
    </div>
@endsection
