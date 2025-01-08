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
    onclick="openUpdateModal('{{ $item->id }}', '{{ $item->first_name }}', '{{ $item->last_name }}', '{{ $item->phone_number }}', '{{ $item->country }}', '{{ $item->address }}', '{{ $item->email }}')" 
    class="px-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('messages.users.update') }}</button>

                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        
        <!-- Add a Modal for the Update Form -->
<!-- Update Modal -->
<div id="updateModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h2 class="text-2xl font-bold mb-4">{{ __('messages.users.update') }}</h2>
        
        <form action="{{ route('admin.users.updateUser') }}" method="POST" id="updateForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="userId" id="userId">
            
            <div class="mb-4">
                <label for="first_name" class="block">{{ __('messages.users.first_name') }}</label>
                <input type="text" id="first_name" name="first_name" class="w-full px-4 py-2 border rounded" required>
            </div>
            
            <div class="mb-4">
                <label for="last_name" class="block">{{ __('messages.users.last_name') }}</label>
                <input type="text" id="last_name" name="last_name" class="w-full px-4 py-2 border rounded" required>
            </div>
            
            <div class="mb-4">
                <label for="phone_number" class="block">{{ __('messages.users.phone_number') }}</label>
                <input type="text" id="phone_number" name="phone_number" class="w-full px-4 py-2 border rounded" required>
            </div>
            
            <div class="mb-4">
                <label for="country" class="block">{{ __('messages.users.country') }}</label>
                <input type="text" id="country" name="country" class="w-full px-4 py-2 border rounded" required>
            </div>
            
            <div class="mb-4">
                <label for="address" class="block">{{ __('messages.users.address') }}</label>
                <input type="text" id="address" name="address" class="w-full px-4 py-2 border rounded" required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block">{{ __('messages.users.email') }}</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded" required>
            </div>
            
            <div class="mb-4">
                <label for="password" class="block">{{ __('messages.users.password') }}</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded" required>
            </div>
            
            <div class="mb-4">
                <label for="confirmPassword" class="block">{{ __('messages.users.confirmPassword') }}</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="w-full px-4 py-2 border rounded" required>
            </div>
            
                  
            <div class="flex justify-end">
                <button type="button" onclick="closeUpdateModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg mr-2">{{ __('messages.cancel') }}</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
</div>

<script>
   function openUpdateModal(id, firstName, lastName, phoneNumber, country, address, email) {
    // Populate the modal with the user's data
    document.getElementById('userId').value = id;
    document.getElementById('first_name').value = firstName;
    document.getElementById('last_name').value = lastName;
    document.getElementById('phone_number').value = phoneNumber;
    document.getElementById('country').value = country;
    document.getElementById('address').value = address;
    document.getElementById('email').value = email;
    
    // Display the modal
    document.getElementById('updateModal').classList.remove('hidden');
}

function closeUpdateModal() {
    // Hide the modal
    document.getElementById('updateModal').classList.add('hidden');
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