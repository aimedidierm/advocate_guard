@extends('layout')

@section('content')
<x-community-navbar />
<div class="p-4 sm:ml-64">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Community Dashboard Report</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
            <p class="text-gray-500 text-sm font-medium dark:text-gray-400">Total Surveys</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $reportData['total_surveys'] }}</p>
        </div>
        <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
            <p class="text-gray-500 text-sm font-medium dark:text-gray-400">Answered Surveys</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $reportData['answered_surveys'] }}</p>
        </div>
        <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
            <p class="text-gray-500 text-sm font-medium dark:text-gray-400">Active Users</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $reportData['active_users'] }}</p>
        </div>
    </div>

    <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800 mb-8">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">E-learning</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-300">
            Total Modules Accessed:
            <span class="text-gray-900 dark:text-white font-bold">{{ $reportData['e_learning_modules'] }}</span>
        </p>
    </div>

    <h2 class="text-xl font-semibold mt-8 mb-4 text-gray-800 dark:text-white">Surveys</h2>
    <p class="text-gray-600 dark:text-gray-300">
        Total Surveys: <span class="font-bold text-gray-900 dark:text-white">{{ $reportData['total_surveys'] }}</span>
    </p>
    <p class="text-gray-600 dark:text-gray-300">
        Surveys Answered: <span class="font-bold text-gray-900 dark:text-white">{{ $reportData['answered_surveys']}}
        </span>
    </p>
</div>
@endsection