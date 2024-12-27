@extends('layout')

@section('content')

<x-community-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex justify-between">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$survey->title}}</h5>
            <a href="/community/survey"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
              {{ __('messages.surveydetail.backbtn') }}
            </a>
        </div>
        <x-message-component />

        @if($survey)
        <div class="mt-4">

            <p>{{ $survey->description }}</p>

            <h6 class="font-semibold">{{ __('messages.surveydetail.question') }}</h6>

            <div>
                <ul class="list-disc list-inside ">
                    @foreach(json_decode($survey->questions, true) as $index => $question)
                    {{ $index + 1 }}. {{ $question }} <br>

                    @endforeach
                </ul>
            </div>
        </div>
        @else
        <p class="text-red-500">{{ __('messages.surveydetail.message') }}</p>
        @endif
    </div>
</div>

@stop