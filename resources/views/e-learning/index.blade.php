@extends('layout')

@section('content')
@if (Auth::user()->role == App\Enums\UserRole::COMMUNITY->value)
<x-community-navbar />
@else
<x-child-navbar />
@endif
<div class="p-4 sm:ml-64">
    <div class=" p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-3xl font-bold mb-6">Courses</h1>

        @foreach($courses as $course)
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold">{{ $course->name }}</h2>
            <p class="text-gray-700">{{ $course->description }}</p>
            <h3 class="text-xl font-medium mt-4">Lessons:</h3>
            <ul class="list-disc list-inside">
                @foreach($course->lessons as $lesson)
                <li class="mt-2">
                    <a href="
                    @if (Auth::user()->role == App\Enums\UserRole::COMMUNITY->value)
                    {{ route('community.lessons.show', $lesson->id) }}
                    @else
                    {{ route('child.lessons.show', $lesson->id) }}
                    @endif
                     " class="text-blue-500 hover:underline">
                        {{ $lesson->title }}
                    </a>
                    <p class="text-gray-600 text-sm">{{ $lesson->description }}</p>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection