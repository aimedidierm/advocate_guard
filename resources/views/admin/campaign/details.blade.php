@extends('layout')

@section('content')

<x-admin-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex justify-between">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$campaign->name}}</h5>
            <a href="/admin/campaign"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Back
            </a>
        </div>
        <x-message-component />

        @if($campaign)
        <div class="mt-4">
            <h6 class="font-semibold">Objective:</h6>
            <p>{{ $campaign->objective }}</p>
            <h6 class="font-semibold">Goal:</h6>
            <ul>
                @foreach(json_decode($campaign->goals, true) as $index => $goal)
                <li>
                    <spam>
                        {{ basename($goal) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">Target Audience:</h6>
            <ul>
                @foreach(json_decode($campaign->target_audience, true) as $index => $item)
                <li>
                    <spam>
                        {{ basename($item) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">Budget Resources:</h6>
            <ul>
                @foreach(json_decode($campaign->budget_resources, true) as $index => $item)
                <li>
                    <spam>
                        {{ basename($item) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">Timeline:</h6>
            <ul>
                @foreach(json_decode($campaign->timeline, true) as $index => $item)
                <li>
                    <spam>
                        {{ basename($item) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">Role Responsibilities:</h6>
            <ul>
                @foreach(json_decode($campaign->role_responsibilities, true) as $index => $item)
                <li>
                    <spam>
                        {{ basename($item) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">Stage: {{$campaign->stage}}</h6>
        </div>
        @else
        <p class="text-red-500">Campaign not found.</p>
        @endif
    </div>
</div>

@stop