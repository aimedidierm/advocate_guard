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
</div>
@stop