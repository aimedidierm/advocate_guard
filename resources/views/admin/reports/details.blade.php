@extends('layout')

@section('content')

<x-admin-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex justify-between">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Report Details</h5>
            <a href="/admin/reporting"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Back
            </a>
        </div>
        <x-message-component />

        @if($report)
        <div class="mt-4">
            <h6 class="font-semibold">Subject:</h6>
            <p>{{ $report->subject }}</p>

            <h6 class="font-semibold">Description:</h6>
            <p>{{ $report->description }}</p>

            <h6 class="font-semibold">Victim:</h6>
            <p>{{ $report->victim }}</p>

            <h6 class="font-semibold">Location:</h6>
            <p>{{ $report->location }}</p>

            <h6 class="font-semibold">Status:</h6>
            <p>{{ $report->still_going ? 'Still Ongoing' : 'Resolved' }}</p>

            <h6 class="font-semibold">Date:</h6>
            <p>{{ $report->when }}</p>

            <h6 class="font-semibold">Attachments:</h6>
            @if(!empty($report->attachments) && is_array($report->attachments))
            <ul>
                @foreach($report->attachments as $attachment)
                <li>
                    <a href="{{ asset('storage/' . $attachment) }}" target="_blank"
                        class="text-blue-600 hover:underline">
                        {{ basename($attachment) }}
                    </a>
                </li>
                @endforeach
            </ul>
            @else
            <p>No attachments available.</p>
            @endif

            <h6 class="font-semibold">Leaning:</h6>
            <p>{{ $report->leaning }}</p>

            <h6 class="font-semibold">Category:</h6>
            <p>{{ $report->category }}</p>

            <h6 class="font-semibold">Reported By:</h6>
            <p>Name: {{ $report->user->name }}</p>
            <p>Email: {{ $report->user->email }}</p>
            <p>Role: {{ $report->user->role }}</p>
        </div>
        @else
        <p class="text-red-500">Report not found.</p>
        @endif
    </div>
</div>

@stop