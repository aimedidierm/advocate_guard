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
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Update your details</h5>
        <br>
        <x-message-component />
        <div class="max-w-full mx-auto rounded p-6 shadow-md">
            <form action="/auth/settings" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="flex space-x-4 py-2">
                    <div class="w-1/3">
                        <label for="first_name" class="block font-bold mb-2">First Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s"
                            placeholder="Enter your name" value="{{Auth::user()->first_name}}" required>
                    </div>
                    <div class="w-1/3">
                        <label for="last_name" class="block font-bold mb-2">Last Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s"
                            placeholder="Enter your name" value="{{Auth::user()->last_name}}" required>
                    </div>
                    <div class="w-1/3">
                        <label for="id_number" class="block font-bold mb-2">ID/Passport</label>
                        <input type="text" id="id_number" name="id_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s"
                            placeholder="Enter ID/Passport" value="{{Auth::user()->id_number}}" disabled>
                    </div>
                </div>
                <div class="flex space-x-4 py-2">
                    <div class="w-1/3">
                        <label for="phone_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            number</label>
                        <input type="number" name="phone_number" id="phone_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your phone number" value="{{Auth::user()->phone_number}}" required="">
                    </div>
                    <div class="w-1/3">
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Country</label>
                        <input type="text" name="country" id="country"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Country" value="{{Auth::user()->country}}" required="">
                    </div>
                    <div class="w-1/3">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Address</label>
                        <input type="text" name="address" id="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter address" value="{{Auth::user()->address}}" required="">
                    </div>
                </div>
                <div class="flex space-x-4 py-2">
                    <div class="w-1/3">
                        <label for="email" class="block  font-bold mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your email" value="{{Auth::user()->email}}" required>
                    </div>

                    <div class="w-1/3">
                        <label for="password" class="block  font-bold mb-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="*********" required>
                    </div>

                    <div class="w-1/3">
                        <label for="password" class="block  font-bold mb-2">Confirm password</label>
                        <input type="password" id="password" name="confirmPassword"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="*********" required>
                    </div>
                </div>
                <br>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update
                        Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@stop