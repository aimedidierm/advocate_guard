@extends('layout')

@section('content')
@if (Auth::user()->role == App\Enums\UserRole::COMMUNITY->value)
<x-community-navbar />
@else
<x-child-navbar />
@endif
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-4">
            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight ">Video:</h5>
                <a href="
                @if (Auth::user()->role == App\Enums\UserRole::COMMUNITY->value)
                /community/e-learning
                @else
                /child/e-learning
                @endif
                "
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>
            </div>

            <video controls class="w-full mt-2">
                <source src="{{ asset($lesson->src) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <h1 class="text-3xl font-bold mb-4">{{ $lesson->title }}</h1>
        <p class="mb-4">{{ $lesson->description }}</p>
    </div>
</div>
@endsection