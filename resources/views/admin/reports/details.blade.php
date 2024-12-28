@extends('layout')

@section('content')

<x-admin-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('messages.adminreportDetails.title') }}</h5>
            <a href="/admin/reporting"
                class="inline-block px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Back
            </a>
        </div>

        <x-message-component />

        @if($report)
        <div class="space-y-4">
             <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">{{ __('messages.adminreportDetails.category') }}</h6>
                <p>{{ $report->type_abuse }}</p>
            </div>

            <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">{{ __('messages.adminreportDetails.description') }}</h6>
                <p>{{ $report->description }}</p>
            </div>

            <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">{{ __('messages.adminreportDetails.province') }}</h6>
                <p>{{ $report->province }}</p>
            </div>

            <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">{{ __('messages.adminreportDetails.district') }}</h6>
                <p>{{ $report->district }}</p>
            </div>
            <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">{{ __('messages.adminreportDetails.sector') }}</h6>
                <p>{{ $report->sector }}</p>
            </div>

            <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">{{ __('messages.adminreportDetails.status') }}</h6>
                <p>{{ $report->still_going ? 'Still Ongoing' : 'Resolved' }}</p>
            </div>

            <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">{{ __('messages.adminreportDetails.date') }}</h6>
                <p>{{ $report->date_incident }}</p>
            </div>

            <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">{{ __('messages.adminreportDetails.attachment') }}</h6>
                @if($report->attachments && is_array($report->attachments) && count($report->attachments) > 0)
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($report->attachments as $attachment)
                    <li>
                        <a href="{{ asset('storage/' . $attachment) }}" target="_blank"
                            class="text-blue-600 hover:underline">{{ basename($attachment) }}</a>
                    </li>
                    @endforeach
                </ul>
                @else
                <p> {{ __('messages.adminreportDetails.messageAttachment') }}</p>
                @endif
            </div>

            <div>
                <h6 class="font-semibold text-gray-700 dark:text-gray-300">Reported By:{{ __('messages.adminreportDetails.reportedby') }}</h6>
                <p><strong>{{ __('messages.adminreportDetails.names') }}</strong> {{ $report->user->first_name . ' ' . $report->user->last_name}}</p>
                <p><strong>{{ __('messages.adminreportDetails.email') }}</strong> {{ $report->user->email }}</p>
                <p><strong>{{ __('messages.adminreportDetails.phone') }}</strong> {{ $report->user->phone_number }}</p>
                <p><strong>{{ __('messages.adminreportDetails.role') }}</strong> {{ $report->user->role }}</p>
            </div>
        </div>
        @else
        <p class="text-red-500">Report not found.</p>
        @endif
    </div>
</div>

@stop