@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <div class="page-pretitle">Overview</div>
            <h2 class="page-title">Dashboard</h2>
        </div>
    </div>
    <div class="row">
        {{-- Total Members --}}
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="detail">
                                <p class="detail-subtitle">Members</p>
                                <span class="number">{{ $cooperative->members_count }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fas fa-user-plus"></i> Total Members
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Products --}}
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="olive fas fa-boxes"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="detail">
                                <p class="detail-subtitle">Products</p>
                                <span class="number">{{ $cooperative->products_count }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fas fa-calendar"></i> Total Products
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Farms --}}
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="violet fas fa-tractor"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="detail">
                                <p class="detail-subtitle">Farms</p>
                                <span class="number">{{ $cooperative->farms_count }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fas fa-calendar-day"></i> Total Farms
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Coffee Tips --}}
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="orange fas fa-lightbulb"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="detail">
                                <p class="detail-subtitle">Coffee Tips</p>
                                <span class="number">{{ $cooperative->coffee_tips_count }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fas fa-book"></i> Tips Shared
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="content">
                            <div class="head">
                                <h5 class="mb-0">Harvest Overview</h5>
                                <p class="text-muted">Monthly harvest data for this year</p>
                            </div>
                            <div class="canvas-wrapper">
                                <canvas class="chart" id="harvestChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="content">
                            <div class="head">
                                <h5 class="mb-0">Sales Overview</h5>
                                <p class="text-muted">Current year sales data</p>
                            </div>
                            <div class="canvas-wrapper">
                                <canvas class="chart" id="sales"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="content">
                    <div class="head">
                        <h5 class="mb-0">Latest Members</h5>
                        <p class="text-muted">Recently joined cooperative members</p>
                    </div>
                    <div class="canvas-wrapper">
                        <table class="table table-striped" id="dataTables-example" width="100%">
                            <thead class="success">
                                <tr>
                                    <th>Name</th>
                                    <th class="text-end">Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cooperative->members as $member)
                                <tr>
                                    <td>{{ $member->full_name }}</td>
                                    <td class="text-end">{{ $member->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="content">
                    <div class="head">
                        <h5 class="mb-0">Latest Products</h5>
                        <p class="text-muted">Recently added coffee products</p>
                    </div>
                    <div class="canvas-wrapper">
                        <table class="table table-striped" id="dataTables-example" width="100%">
                            <thead class="success">
                                <tr>
                                    <th>Name</th>
                                    <th class="text-end">Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cooperative->coffeeProducts as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-end">{{ $product->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="content">
                    <div class="head">
                        <h5 class="mb-0">Latest Farms</h5>
                        <p class="text-muted">Recently registered farms</p>
                    </div>
                    <div class="canvas-wrapper">
                        <table class="table table-striped" id="dataTables-example" width="100%">
                            <thead class="success">
                                <tr>
                                    <th>Farm Name</th>
                                    <th class="text-end">Registered</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cooperative->farms as $farm)
                                <tr>
                                    <td>{{ $farm->name }}</td>
                                    <td class="text-end">{{ $farm->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="content">
                    <div class="head">
                        <h5 class="mb-0">Latest Harvests</h5>
                        <p class="text-muted">Recent coffee harvest entries</p>
                    </div>
                    <div class="canvas-wrapper">
                        <table class="table table-striped" id="dataTables-example" width="100%">
                            <thead class="success">
                                <tr>
                                    <th>Harvest ID</th>
                                    <th class="text-end">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cooperative->harvests as $harvest)
                                <tr>
                                    <td>Harvest #{{ $harvest->id }}</td>
                                    <td class="text-end">{{ $harvest->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('harvestChart').getContext('2d');
        const harvestChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Harvest Quantity (kg)',
                    data: @json($totals),
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantity (kg)'
                        }
                    }
                }
            }
        });
    });
</script>

@endsection