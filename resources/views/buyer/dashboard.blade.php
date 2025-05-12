@extends('layouts.buyer')
@section('title', 'Buyer Dashboard')

@section('content')
<div class="container mt-4">
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4>{{ $orderCount }}</h4>
                    <p>Orders</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4>RWF {{ number_format($totalSpent) }}</h4>
                    <p>Total Spent</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4>{{ $feedbacksCount }}</h4>
                    <p>Feedbacks</p>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h4>Top Purchased Products</h4>
<canvas id="topProductsChart" height="100"></canvas>

<h4>Monthly Spending</h4>
<canvas id="monthlySpendingChart" height="100"></canvas>


<script>
    // Top Purchased Products
    new Chart(document.getElementById('topProductsChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($productNames) !!},
            datasets: [{
                label: 'Quantity Purchased',
                data: {!! json_encode($productQuantities) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Monthly Spending
    new Chart(document.getElementById('monthlySpendingChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Spending (FRW)',
                data: {!! json_encode($spending) !!},
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Product Ratings
    new Chart(document.getElementById('productRatingsChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($ratingLabels) !!},
            datasets: [{
                label: 'Ratings',
                data: {!! json_encode($ratingCounts) !!},
                backgroundColor: [
                    '#4caf50',
                    '#2196f3',
                    '#ff9800',
                    '#f44336',
                    '#9c27b0'
                ]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>

    </div>
</div>
@endsection
