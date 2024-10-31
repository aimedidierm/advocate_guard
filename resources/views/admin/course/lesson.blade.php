@extends('layout')

@section('content')

<x-admin-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex justify-between">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$lesson->course->name}}</h5>
            <a href="/admin/e-learning/course/{{$lesson->course->id}}"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Back
            </a>
        </div>
        <br>
        <video class="w-full" autoplay controls>
            <source src="{{$lesson->src}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="p-6">
            <h1 class="text-2xl font-semibold text-gray-800 mb-2">{{$lesson->title}}</h1>
            <p class="text-gray-600">
                {{$lesson->description}}
            </p>
        </div>
    </div>
</div>
@stop