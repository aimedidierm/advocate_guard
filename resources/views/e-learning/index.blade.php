@extends('layout')

@section('content')
@if (Auth::user()->role == App\Enums\UserRole::COMMUNITY->value)
<x-community-navbar />
@else
<x-child-navbar />
@endif
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-3xl font-bold mb-6">{{ __('messages.e-learning.title') }}</h1>

        @foreach($courses as $course)
        <div class="shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold">{{ $course->name }}</h2>
            <p>{{ $course->description }}</p>
            <h3 class="text-xl font-medium mt-4">{{ __('messages.e-learning.lesson') }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                @foreach($course->lessons as $lesson)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    @if ($lesson->image)
                    <img src="{{ asset($lesson->image) }}" alt="{{ $lesson->title }}"
                        class="w-full h-32 sm:h-48 object-cover">
                    @else
                    <img src="/images/bg3.jpeg" alt="{{ $lesson->title }}" class="w-full h-32 sm:h-48 object-cover">
                    @endif <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 text-black dark:text-black">{{ $lesson->title }}</h4>
                        <p class="text-gray-600">{{ Str::limit($lesson->description, 100) }}</p>
                        <a href="
                        @if (Auth::user()->role == App\Enums\UserRole::COMMUNITY->value)
                        {{ route('community.lessons.show', $lesson->id) }}
                        @else
                        {{ route('child.lessons.show', $lesson->id) }}
                        @endif
                        " class="text-blue-500 hover:underline mt-4 inline-block">{{ __('messages.e-learning.readmore') }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection