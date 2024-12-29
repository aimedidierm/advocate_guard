@extends('layout')

@section('content')
<x-admin-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex items-center p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="p-3 bg-blue-100 rounded-full dark:bg-blue-900">
                    <span class="material-symbols-outlined text-blue-500 dark:text-blue-300">groups</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Users</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{$users}}</p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="p-3 bg-green-100 rounded-full dark:bg-green-900">
                    <span class="material-symbols-outlined text-green-500 dark:text-green-300">contact_mail</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Campaigns</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{$campaigns}}</p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="p-3 bg-yellow-100 rounded-full dark:bg-yellow-900">
                    <span class="material-symbols-outlined text-yellow-500 dark:text-yellow-300">file_copy</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Surveys Completed</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{$surveys}}</p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="p-3 bg-red-100 rounded-full dark:bg-red-900">
                    <span class="material-symbols-outlined text-red-500 dark:text-red-300">summarize</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Reported Abuse</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{$reports}}</p>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Detailed Insights</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Average Campaign Reach</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{$campaignReach}}</p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Monthly Active Users</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{$activeUsers}}</p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Feedbacks Received</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{$surveysAnswers}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Reports Analytics</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">

            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                <h4 class="text-lg font-medium text-gray-900 dark:text-white">Reports by Category</h4>
                <canvas id="categoryChart"></canvas>
            </div>

            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                <h4 class="text-lg font-medium text-gray-900 dark:text-white">Reports by Province</h4>
                <canvas id="provinceChart"></canvas>
            </div>
        </div>

        <div class="mt-6">
            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Reports Over Time (Last 30 Days)</h4>
            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                <canvas id="reportsOverTimeChart"></canvas>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const categoryData = {!! json_encode($reportsByCategory) !!};
    const categoryLabels = categoryData.map(item => item.category);
    const categoryCounts = categoryData.map(item => item.count);

    const categoryChart = new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Reports by Category',
                data: categoryCounts,
                backgroundColor: '#4CAF50',
                borderColor: '#388E3C',
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

    const provinceData = {!! json_encode($reportsByProvince) !!};
    const provinceLabels = provinceData.map(item => item.province);
    const provinceCounts = provinceData.map(item => item.count);

    const provinceChart = new Chart(document.getElementById('provinceChart'), {
        type: 'pie',
        data: {
            labels: provinceLabels,
            datasets: [{
                label: 'Reports by Province',
                data: provinceCounts,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });

    const reportsOverTimeData = {!! json_encode($reportsOverTime) !!};
    const dates = Object.keys(reportsOverTimeData);
    const counts = Object.values(reportsOverTimeData);

    const reportsOverTimeChart = new Chart(document.getElementById('reportsOverTimeChart'), {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Reports in the Last 30 Days',
                data: counts,
                fill: false,
                borderColor: '#FF5733',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Reports'
                    }
                }
            }
        }
    });
</script>
@stop