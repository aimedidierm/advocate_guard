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
    <x-message-component />

    <form action="{{ route('platform.posts.store') }}" method="POST" class="mb-6" enctype="multipart/form-data">
        @csrf
        <textarea name="content"
            class="w-full p-4 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
            placeholder="Share something..." required></textarea>
        <label for="image-upload" class="cursor-pointer">
            <span class="material-symbols-outlined text-blue-500">
                image
            </span>
        </label>
        <input type="file" name="image" id="image-upload" class="hidden"><br>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Post</button>
    </form>

    <div class="space-y-4">
        @foreach ($posts as $post)
        <div class="p-4 bg-white dark:bg-gray-900 rounded shadow">
            <div class="flex items-center space-x-4">
                @if ($post->user->profile_image)
                <img src="{{ asset('storage/' . $post->user->profile_image) }}" alt="Profile Image"
                    class="w-10 h-10 rounded-full">
                @else
                <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile Image"
                    class="w-10 h-10 rounded-full">
                @endif
                <p class="font-semibold">{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
            </div>
            <p>{{ $post->content }}</p>
            @if ($post->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-auto rounded">
            </div>
            @endif

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

                <form action="{{ route('platform.posts.comment', $post) }}" method="POST" enctype="multipart/form-data"
                    class="flex-grow flex items-center space-x-2">
                    @csrf
                    <input type="text" name="content" placeholder="Add a comment"
                        class="w-full p-2 bg-gray-200 dark:bg-gray-700 rounded">
                    <label for="comment-image-upload" class="cursor-pointer">
                        <span class="material-symbols-outlined text-blue-500">
                            image
                        </span>
                    </label>
                    <input type="file" name="image" id="comment-image-upload" class="hidden">
                    <button type="submit" class="text-blue-500">
                        <span class="material-symbols-outlined">
                            send
                        </span>
                    </button>
                </form>
            </div>

            <div class="mt-4 space-y-2">
                @foreach ($post->comments as $comment)
                <div class="flex items-center space-x-4 text-gray-600 dark:text-gray-400">
                    @if ($comment->user->profile_image)
                    <img src="{{ asset('storage/' . $comment->user->profile_image) }}" alt="Profile Image"
                        class="w-8 h-8 rounded-full">
                    @else
                    <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile Image"
                        class="w-8 h-8 rounded-full">
                    @endif
                    <div>
                        <strong>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong>: {{
                        $comment->content }}
                        @if ($comment->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $comment->image) }}" alt="Comment Image"
                                class="w-full h-auto rounded">
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop