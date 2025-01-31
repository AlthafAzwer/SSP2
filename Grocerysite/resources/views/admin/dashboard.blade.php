@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Admin Dashboard</h2>

    <!-- Statistics Cards -->
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h3 class="text-lg font-bold text-gray-800">Total Users</h3>
            <p class="text-3xl font-semibold text-blue-500">{{ number_format($totalUsers) }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h3 class="text-lg font-bold text-gray-800">Total Orders</h3>
            <p class="text-3xl font-semibold text-green-500">{{ number_format($totalOrders) }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h3 class="text-lg font-bold text-gray-800">Total Products</h3>
            <p class="text-3xl font-semibold text-yellow-500">{{ number_format($totalProducts) }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h3 class="text-lg font-bold text-gray-800">Total Queries</h3>
            <p class="text-3xl font-semibold text-red-500">{{ number_format($totalQueries) }}</p>
        </div>
    </div>

    <!-- Analytics Charts -->
    <div class="grid md:grid-cols-2 gap-6">
        <!-- Revenue Growth Chart -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Revenue Growth</h3>
            <canvas id="revenueChart"></canvas>
        </div>

        <!-- Most Bought Items Chart -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Most Bought Items</h3>
            <canvas id="mostBoughtItemsChart"></canvas>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Revenue Growth Chart
        const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctxRevenue, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [200, 450, 700, 1200, 1600, 1900, 2500],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Most Bought Items Chart
        const ctxItems = document.getElementById('mostBoughtItemsChart').getContext('2d');
        new Chart(ctxItems, {
            type: 'bar',
            data: {
                labels: ['Apples', 'Milk', 'Bread', 'Rice', 'Chicken'],
                datasets: [{
                    label: 'Units Sold',
                    data: [120, 150, 200, 90, 110],
                    backgroundColor: ['#f87171', '#60a5fa', '#fbbf24', '#34d399', '#a78bfa'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
