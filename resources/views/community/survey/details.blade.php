@extends('layout')

@section('content')

<x-community-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex justify-between">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$survey->title}}</h5>
            <a href="/community/survey"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Back
            </a>
        </div>
        <x-message-component />

        @if($survey)
        <div class="mt-4">

            <p>{{ $survey->description }}</p>
            <br>
            <div>
                <ul class="list-disc list-inside text-gray-700">
                    <form action="/community/survey-answers" method="POST" enctype="multipart/form-data">
                        <input type="text" name="survey" value="{{$survey->id}}" hidden>
                        @csrf
                        @foreach(json_decode($survey->questions, true) as $index => $question)


                        <div class="mb-6">
                            <label for="questions" class="block mb-2 text-sm font-medium text-gray-900">
                                {{ $index + 1 }}. {{ $question }}
                            </label>
                            <input type="text" id="questions" name="answers[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        @endforeach
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit Answers
                        </button>
                    </form>
                </ul>
            </div>
        </div>
        @else
        <p class="text-red-500">Survey not found.</p>
        @endif
    </div>
</div>

@stop