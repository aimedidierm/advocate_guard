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
            @if ($campaign->image)
            <img id="profileImagePreview" src="{{ asset('storage/' . $campaign->image) }}" alt="Campaign Image">
            @else
            <img id="profileImagePreview" src="{{ asset('images/bg2.jpeg') }}" alt="Default Campaign Image">
            @endif
            <h6 class="font-semibold">{{ __('messages.campaigndisplay.objective') }}</h6>
            <p>{{ $campaign->objective }}</p>
            <h6 class="font-semibold">{{ __('messages.campaigndisplay.goal') }}</h6>
            <h6 class="font-semibold">{{ __('messages.campaign.startdate') }}: {{ $campaign->start_date }}</h6>
            <h6 class="font-semibold">{{ __('messages.campaign.enddate') }}: {{ $campaign->end_date }}</h6>
            <ul>
                @foreach(json_decode($campaign->goals, true) as $index => $goal)
                <li>
                    <spam>
                        {{ basename($goal) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">{{ __('messages.campaigndisplay.audience') }}</h6>
            <ul>
                @foreach(json_decode($campaign->target_audience, true) as $index => $item)
                <li>
                    <spam>
                        {{ basename($item) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">{{ __('messages.campaigndisplay.resource') }}</h6>
            <ul>
                @foreach(json_decode($campaign->budget_resources, true) as $index => $item)
                <li>
                    <spam>
                        {{ basename($item) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">{{ __('messages.campaigndisplay.timeline') }}</h6>
            <ul>
                @foreach(json_decode($campaign->timeline, true) as $index => $item)
                <li>
                    <spam>
                        {{ basename($item) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">{{ __('messages.campaigndisplay.role') }}</h6>
            <ul>
                @foreach(json_decode($campaign->role_responsibilities, true) as $index => $item)
                <li>
                    <spam>
                        {{ basename($item) }}
                    </spam>
                </li>
                @endforeach
            </ul>
            <h6 class="font-semibold">{{ __('messages.campaigndisplay.stage') }}{{$campaign->stage}}</h6>
        </div>
        @else
        <p class="text-red-500">Campaign not found.{{ __('messages.campaigndisplay.message') }}</p>
        @endif
    </div>
</div>

@stop