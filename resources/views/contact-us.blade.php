<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100" >

    <x-landing-page-navbar />
    <div class="max-w-7xl mx-auto py-12 px-4" >
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800"> {{ __('messages.contactus.title') }}</h1>
            <p class="text-gray-600 mt-2"> {{ __('messages.contactus.subtitle') }}
            </p>
        </div>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <form action="/contact" method="POST" class="space-y-6">
                    @csrf
                    @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-4 rounded-md mb-6">
                            {{ session('success') }}
                    </div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-800 p-4 rounded-md mb-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            {{ __('messages.contactus.name') }}</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('messages.contactus.email') }}</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('messages.contactus.phone') }}</label>
                        <input type="tel" name="phone" id="phone" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">{{ __('messages.contactus.message') }}</label>
                        <textarea name="message" id="message" rows="4" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('messages.contactus.messagebtn') }}</button>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 p-4 text-start">
                <br><br>
                <h2 class="text-2xl font-bold text-gray-800">{{ __('messages.contactus.info') }}</h2>
                <p class="text-gray-600 mt-2"> {{ __('messages.contactus.emailA') }}<a href="mailto:sergohakiza@gmail.com"
                        class="text-blue-600 hover:underline"> sergohakiza@gmail.com</a></p>
                <p class="text-gray-600 mt-2">{{ __('messages.contactus.phoneA') }} <a href="tel:+250787360929"
                        class="text-blue-600 hover:underline">+250 787 360 929</a></p>
            </div>
        </div>
    </div>
    <x-landing-page-footer />
</body>

</html>