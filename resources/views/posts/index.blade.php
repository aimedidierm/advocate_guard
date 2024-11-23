@extends('layout')

@section('content')
@if (Auth::user()->role == App\Enums\UserRole::ADMIN->value)
<x-admin-navbar />
@elseif(Auth::user()->role == App\Enums\UserRole::COMMUNITY->value)
<x-community-navbar />
@else
<x-child-navbar />
@endif
<div class="p-4 sm:ml-64">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Community Platform</h1>
    </div>

    <form action="{{ route('platform.posts.store') }}" method="POST" class="mb-6">
        @csrf
        <textarea name="content"
            class="w-full p-4 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
            placeholder="Share something..." required></textarea>
        <button type="submit" class="mt-2 px-4 py-2 bg-green-500 text-white rounded">Post</button>
    </form>

    <div class="space-y-4">
        @foreach ($posts as $post)
        <div class="p-4 bg-white dark:bg-gray-900 rounded shadow">
            <p class="font-semibold">{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
            <p>{{ $post->content }}</p>

            <div class="flex items-center space-x-4 mt-4">
                <span class="text-blue-500"> ({{ $post->likes->count() ."Likes"}})</span>
                <form action="{{ route('platform.posts.like', $post) }}" method="POST">
                    @csrf
                    <button class="text-blue-500">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                    </button>
                </form>

                <span class="text-gray-500">|</span>

                <form action="{{ route('platform.posts.comment', $post) }}" method="POST" class="flex-grow">
                    @csrf
                    <input type="text" name="content" placeholder="Add a comment"
                        class="w-full p-2 bg-gray-200 dark:bg-gray-700 rounded">
                </form>
            </div>

            <div class="mt-4 space-y-2">
                @foreach ($post->comments as $comment)
                <div class="text-gray-600 dark:text-gray-400">
                    <strong>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong>: {{
                    $comment->content }}
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop