@extends('layout')

@section('content')

<x-admin-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('messages.users.title') }}</h5>
        <x-message-component />
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('messages.users.name') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                             {{ __('messages.users.email') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('messages.users.role') }}
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th colspan="6" scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ __('messages.users.message') }}
                        </th>
                    </tr>
                    @else
                    @foreach ($users as $item)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->first_name}} {{$item->last_name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->role}}
                        </td>
                        <td class="flex px-6 py-4">
                            <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 font-medium text-red-600 dark:text-red-500 hover:underline">{{ __('messages.users.delete') }}</button>
                            </form>
                            <button 
                              onclick="openUpdateModal('{{ $item->id }}', '{{ $item->first_name }}', '{{ $item->last_name }}', '{{ $item->id_number }}', '{{ $item->phone_number }}', '{{ $item->country }}', '{{ $item->address }}', '{{ $item->email }}', )" 
                              class="px-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                              {{ __('messages.users.update') }}
                            </button>

                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        
        <!-- Add a Modal for the Update Form -->
        <!-- Update Modal -->
        <div id="updateModal" class="max-w-full mx-auto rounded p-6 shadow-md dark:border-gray-700 hidden">
            <div class=" dark:border-gray-700 p-6 rounded-lg w-3/4 dark:text-gray-400">
                <h2 class="text-2xl font-bold mb-4">{{ __('messages.users.updateTitle') }}</h2>
                
                                
                <form action="{{ route('admin.users.updateUser') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Hidden field for User ID -->
                    <input type="hidden" id="user_id" name="userId">
                    
                    <div class="flex space-x-4 py-2">
                        <div class="w-1/3">
                            <label for="first_name" class="block font-bold mb-2 ">{{ __('messages.users.updateFName') }}</label>
                            <input type="text" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Enter First Name">
                        </div>
                        
                        <div class="w-1/3">
                            <label for="last_name" class="block font-bold mb-2">{{ __('messages.users.updateLName') }}</label>
                            <input type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Enter Last Name">
                        </div>

                        <div class="w-1/3">
                            <label for="passport" class="block font-bold mb-2">{{ __('messages.users.updatePassport') }}</label>
                            <input type="text" id="id_number" name="id_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Enter ID/Passport">
                        </div>
                    </div>
                    <div class="flex space-x-4 py-2">
                        <div class="w-1/3">
                            <label for="phone_number" class="block font-bold mb-2">{{ __('messages.users.updatePhNumber') }}</label>
                            <input type="text" id="phone_number" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Enter Phone Number">
                        </div>
                        
                        <div class="w-1/3">
                            <label for="country" class="block font-bold mb-2">{{ __('messages.users.updateCountry') }}</label>
                            <input type="text" id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Enter Country">
                        </div>

                        <div class="w-1/3">
                            <label for="address" class="block font-bold mb-2">{{ __('messages.users.updateAddress') }}</label>
                            <input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Enter Address">
                        </div>
                    </div>

                    <div class="flex space-x-4 py-2">
                        <div class="w-1/3">
                            <label for="email" class="block font-bold mb-2">{{ __('messages.users.updateEmail') }}</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Enter Email">
                        </div>

                        <div class="w-1/3">
                            <label for="password" class="block font-bold mb-2">{{ __('messages.users.updatePassword') }}</label>
                            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Enter Password">
                        </div>

                        <div class="w-1/3">
                            <label for="confirm_Password" class="block font-bold mb-2">{{ __('messages.users.updateConfPassword') }}</label>
                            <input type="password" id="confirm_Password" name="confirm_Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500s" placeholder="Confirm Password">
                        </div>
                    </div>
                    <!-- Action Buttons -->
                    <!-- div :flex justify-end mt-6
                    class: px-4 py-2 bg-gray-400 text-white rounded-lg mr-4 -->
                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between">
                        <button type="button" onclick="closeUpdateModal()" class="bg-gray-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                           {{ __('messages.users.updateCancelBtn') }}
                        </button>
                        <button type="submit" class="bg-blue-500  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('messages.users.update_updateBtn') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <script>
            function openUpdateModal(id, firstName, lastName, id_number, phoneNumber, country, address, email, password, confirm_Password) {
                // Log data to ensure it's being passed correctly
                console.log(id, firstName, lastName, id_number, phoneNumber, country, address, email, password, confirm_Password);

                // Set form field values dynamically
                document.getElementById('user_id').value = id;
                document.getElementById('first_name').value = firstName;
                document.getElementById('last_name').value = lastName;
                document.getElementById('id_number').value = id_number;
                document.getElementById('phone_number').value = phoneNumber;
                document.getElementById('country').value = country;
                document.getElementById('address').value = address;
                document.getElementById('email').value = email;
                document.getElementById('password').value = password;
                document.getElementById('confirm_Password').value = confirm_Password;

                // Show the modal
                document.getElementById('updateModal').classList.remove('hidden');
                document.getElementById('updateModal').classList.add('block');
            }

            function closeUpdateModal() {
                // Hide the modal
                document.getElementById('updateModal').classList.add('hidden');
                document.getElementById('updateModal').classList.remove('block');
            }

        </script>

        <br>
        <nav aria-label="Page navigation example">
            <ul class="flex items-center -space-x-px h-10 text-base">
                @if ($users->onFirstPage())
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ $users->previousPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>
                @endif
                @foreach ($users->links()->elements as $element)
                @if (is_string($element))
                <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded">{{ $element }}</span>
                @endif

                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $users->currentPage())
                <li>
                    <a href="#" aria-current="page"
                        class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{
                        $page }}</a>
                </li>
                @else
                <li>
                    <a href="{{ $url }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{
                        $page }}</a>
                </li>
                @endif
                @endforeach
                @endif
                @endforeach

                @if ($users->hasMorePages())
                <li>
                    <a href="{{ $users->nextPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
                @else
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@stop