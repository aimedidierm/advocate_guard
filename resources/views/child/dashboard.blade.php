
@extends('layout')

@section('content')
<x-child-navbar />
<div class="p-4 sm:ml-64">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">{{ __('messages.child_dashboard.title') }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Welcome Message -->
        <style>
    .circle {
        width: 56px; /* Adjust size */
        height: 56px; /* Adjust size */
        background-color: #3b82f6; /* Tailwind's blue-500 */
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem; /* Adjust font size */
        font-weight: bold; /* Make the letter bold */
        margin-right: 1rem; /* Space between circle and text */
    }
    </style>

    <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800 flex items-center">
    <div class="circle">
        {{ strtoupper(substr($childName, 0, 1)) }}
    </div>
    <div>
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white"> {{ __('messages.child_dashboard.welcome') }}</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('messages.child_dashboard.welcomeSub') }},<span class="font-bold">{{ $childName }}</span>.</p>
    </div>
</div>
        <!-- E-Learning Modules Completed -->
        <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('messages.child_dashboard.available') }}</h2>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $reportData['modules_completed'] }}</p>
        </div>
        <!-- Reported Abuse -->
        <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('messages.child_dashboard.reported') }}</h2>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $reportData['reports_generated'] }}</p>
        </div>
    </div>

    
    <div class="p-4 bg-white shadow rounded-lg dark:bg-gray-800">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('messages.child_dashboard.resourcesTilte') }}</h2>
    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('messages.child_dashboard.resourcesTilteSub') }}</p>
    <table class="min-w-full bg-white rounded-lg shadow dark:bg-gray-800 mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">{{ __('messages.child_dashboard.resource') }}</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">{{ __('messages.child_dashboard.date') }}</th>
                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600 dark:text-gray-300">{{ __('messages.child_dashboard.preview') }}</th>
                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600 dark:text-gray-300">{{ __('messages.child_dashboard.download') }}</th>
            </tr>
        </thead>
        <tbody class="bg-blue dark:bg-gray-500">
            @foreach ($pdfFiles as $file)
                @php
                    
                    $filePath = Storage::url($file);
                    $fileName = basename($file);
                    // $fileSize = Storage::size($file);
                    // $formattedSize = number_format($fileSize / 1024, 2) . ' KB';
                    // $fileDate = Storage::lastModified($file);
                    // $formattedDate = date('F j, Y', $fileDate);
                @endphp
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <!-- File name and icon -->
                    <td class="px-4 py-3 flex items-center">
                        <img src="https://img.icons8.com/color/48/pdf.png" alt="PDF icon" class="w-6 h-6 mr-2">
                        <a href="{{ $filePath }}" target="_blank" class="text-blue-500 hover:underline">
                            {{ $fileName }}
                        </a>
                    </td>
                    <!-- Date -->
                    <td class="px-4 py-3 text-gray-400 dark:text-gray-300">Dec 29, 2024</td>
                    <!-- Preview -->
                    <td class="px-4 py-3 text-center">
                        <a href="{{ $filePath }}" target="_blank" class="text-blue-500 hover:text-blue-600">
                            <svg class="w-6 h-6 text-blue-500 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 19V6a1 1 0 0 1 1-1h4.032a1 1 0 0 1 .768.36l1.9 2.28a1 1 0 0 0 .768.36H16a1 1 0 0 1 1 1v1M3 19l3-8h15l-3 8H3Z" />
                            </svg>
                        </a>
                    </td>
                    <!-- Download -->
                    <td class="px-4 py-3 text-center">
                        <a href="{{ $filePath }}" download class="text-blue-500 hover:text-blue-600">
                            <svg class="w-6 h-6 text-blue-500 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</div>
@endsection
