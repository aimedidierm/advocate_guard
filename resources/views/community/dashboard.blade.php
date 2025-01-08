@extends('layout')

@section('content')
    <x-community-navbar />

    <div class="p-4 sm:ml-64">
        <!-- Dashboard Heading -->
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">{{ __('messages.community_dashboard.title') }}</h1>

        <!-- Welcome Section -->
        <div class="bg-white shadow-lg rounded-lg dark:bg-gray-800 p-2 mb-6 flex items-center justify-between">
            <div class="flex items-center">
                <!-- Rounded Avatar -->
                <div style="
                    width: 4rem; 
                    height: 4rem; 
                    background-color: rgb(45, 87, 223); 
                    color: white; 
                    border-radius: 50%; 
                    display: flex; 
                    align-items: center; 
                    justify-content: center; 
                    font-size: 1.5rem; 
                    font-weight: bold;">
                    {{ strtoupper(substr($communitydName, 0, 1)) }}
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">{{ __('messages.community_dashboard.welcome') }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 mt-1">{{ __('messages.community_dashboard.welcomeSub') }} {{ $communitydName }}</p>
                </div>
            </div>
            
        </div>

        <!-- Lower Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- E-learning Section -->
            <div >
                <div class="bg-white shadow-lg rounded-lg dark:bg-gray-800 p-6">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">{{ __('messages.community_dashboard.elearning') }}</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        {{ __('messages.community_dashboard.elearningAv') }}:
                        <span class="text-gray-900 dark:text-white font-bold">{{ $reportData['e_learning_modules'] }}</span>
                    </p>
                </div>

                <!-- Surveys Section -->
                <div class="mt-6 bg-white shadow-lg rounded-lg dark:bg-gray-800 p-6">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">{{ __('messages.community_dashboard.survey') }}</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        {{ __('messages.community_dashboard.surveyTotal') }}: <span class="font-bold text-gray-900 dark:text-white">{{ $reportData['total_surveys'] }}</span>
                    </p>
                    <p class="mt-1 text-gray-600 dark:text-gray-300">
                        {{ __('messages.community_dashboard.surveyAns') }}: <span class="font-bold text-gray-900 dark:text-white">{{ $reportData['answered_surveys'] }}</span>
                    </p>
                </div>
                <div class="mt-6 bg-white shadow-lg rounded-lg dark:bg-gray-800 p-6">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">{{ __('messages.community_dashboard.totalCases') }}</h2>
                <p class="text-4xl font-bold text-purple-600 mt-2 " >{{ $reportData['total_cases'] }}</p>
            </div>
            </div>

            <!-- Resource Files Section -->
            <div class="bg-white shadow-lg rounded-lg dark:bg-gray-800 p-6 w-1/4">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">{{ __('messages.community_dashboard.resourcesTitle') }}</h2>
                <p class="text-gray-600 dark:text-gray-300 mt-2">
                    {{ __('messages.community_dashboard.resourcesTitleSub') }}
                </p>
                <ul class="mt-4">
                    @foreach ($pdfFiles as $file)
                        @php
                            $filePath = Storage::url($file);
                            $fileName = basename($file);
                        @endphp
                        <li class="flex items-center justify-between py-2">
                            <!-- PDF Icon -->
                            <img src="https://img.icons8.com/color/48/pdf.png" alt="PDF icon" class="w-6 h-6 mr-2">
                
                            <!-- File Name -->
                            <a href="{{ $filePath }}" class="text-purple-600 hover:underline flex-1">{{ $fileName }}</a>
                            
                            <!-- File Size -->
                            <!-- <span class="text-gray-500 text-sm">4 MB</span> -->
                             <!-- Download Icon -->
                            <a href="{{ $filePath }}" download class="text-blue-500 hover:text-blue-600">
                            <svg class="w-6 h-6 text-blue-500 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd" />
                            </svg>
                             </a>
                            
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Upcoming Campaign Section -->
            <div class="bg-white shadow-lg rounded-lg dark:bg-gray-800 p-6">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">Upcoming Campaign</h2>
                <div class="flex mt-4">
                    <div class="ml-4">
                        <p class="font-semibold text-gray-700 dark:text-gray-300">
                            Safe Childhood – Protecting Children from Violence
                        </p>
                        <img src="/images/campaign.png" alt="Campaign" class="w-55 h-20 rounded-lg">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                            Raise awareness about child abuse and violence prevention. Engage communities to reduce cases 
                            of violence against children and provide a support structure for victims.
                        </p>
                        <p class="text-sm font-bold text-purple-600 mt-2">Starts on May 23, 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
