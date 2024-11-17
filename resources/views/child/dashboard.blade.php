@extends('layout')

@section('content')
<x-child-navbar />
<div class="p-4 sm:ml-64">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Child Dashboard Report</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
            <p class="text-gray-500 text-sm font-medium dark:text-gray-400">Active Sessions</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $reportData['sessions'] }}</p>
        </div>
        <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
            <p class="text-gray-500 text-sm font-medium dark:text-gray-400">E-Learning Modules Completed</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $reportData['modules_completed'] }}</p>
        </div>
        <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
            <p class="text-gray-500 text-sm font-medium dark:text-gray-400">Reported Abuse</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $reportData['reports_generated'] }}</p>
        </div>
    </div>
</div>
@endsection