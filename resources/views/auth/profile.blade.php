@extends('layout')

@section('content')
@if (Auth::user()->role == App\Enums\UserRole::COMMUNITY->value)
<x-community-navbar />
@elseif(Auth::user()->role == App\Enums\UserRole::ADMIN->value)
<x-admin-navbar />
@else
<x-child-navbar />
@endif
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('messages.profile.title') }}</h5>
        <br>
        <x-message-component />
        <div class="max-w-full mx-auto rounded p-6 shadow-md">
            <form action="/auth/settings" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        @if (Auth::user()->profile_image)
                        <img id="profileImagePreview" src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                            alt="Profile Image" class="w-16 h-16 rounded-full">
                        @else
                        <img id="profileImagePreview" src="{{ asset('images/default-profile.jpg') }}"
                            alt="Default Profile Image" class="w-16 h-16 rounded-full">
                        @endif
                        <label for="profile_image"
                            class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                             {{ __('messages.profile.image') }}
                        </label>
                        <input type="file" name="profile_image" id="profile_image" class="hidden"
                            onchange="previewImage(event)">
                    </div>
                </div>
                <br>
                <div class="flex space-x-4 py-2">
                    <div class="w-1/3">
                        <label for="first_name" class="block font-bold mb-2">{{ __('messages.profile.fname') }}</label>
                        <input type="text" id="first_name" name="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s"
                            placeholder="Enter your name" value="{{Auth::user()->first_name}}" required>
                    </div>
                    <div class="w-1/3">
                        <label for="last_name" class="block font-bold mb-2">{{ __('messages.profile.lname') }}</label>
                        <input type="text" id="last_name" name="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s"
                            placeholder="Enter your name" value="{{Auth::user()->last_name}}" required>
                    </div>
                    <div class="w-1/3">
                        <label for="id_number" class="block font-bold mb-2">{{ __('messages.profile.passport') }}</label>
                        <input type="text" id="id_number" name="id_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s"
                            placeholder="Enter ID/Passport" value="{{Auth::user()->id_number}}" disabled>
                    </div>
                </div>
                <div class="flex space-x-4 py-2">
                    <div class="w-1/3">
                        <label for="phone_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.profile.pnber') }}</label>
                        <input type="number" name="phone_number" id="phone_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your phone number" value="{{Auth::user()->phone_number}}" required="">
                    </div>
                    <div class="w-1/3">
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('messages.profile.country') }}</label>
                        <input type="text" name="country" id="country"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Country" value="{{Auth::user()->country}}" required="">
                    </div>
                    <div class="w-1/3">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('messages.profile.address') }}</label>
                        <input type="text" name="address" id="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter address" value="{{Auth::user()->address}}" required="">
                    </div>
                </div>
                <div class="flex space-x-4 py-2">
                    <div class="w-1/3">
                        <label for="email" class="block  font-bold mb-2">{{ __('messages.profile.email') }}</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your email" value="{{Auth::user()->email}}" required>
                    </div>

                    <div class="w-1/3">
                        <label for="password" class="block  font-bold mb-2">{{ __('messages.profile.password') }}</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="*********" required>
                    </div>

                    <div class="w-1/3">
                        <label for="password" class="block  font-bold mb-2">{{ __('messages.profile.confpswd') }}</label>
                        <input type="password" id="password" name="confirmPassword"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="*********" required>
                    </div>
                </div>
                <br>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"> {{ __('messages.profile.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profileImagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@stop