<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <x-landing-page-navbar />
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center min-h-screen bg-cover bg-center"
            style="background-image: url('/images/bg1.jpeg');">
            
            <!-- Welcome Section -->
            <div class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-white dark:text-white sm:text-4xl md:text-5xl">
                  {{ __('messages.register.welcomeTitle') }} 
                </h1>
                <h2 class="mt-2 text-lg font-medium text-white dark:text-gray-300 sm:text-xl">
                  {{ __('messages.register.welcomeTitleSub') }} 
                </h2>
            </div>

            <!-- Registration Form Section -->
            <div class="w-full max-w-xl bg-white p-6 rounded-lg shadow-lg">
                <div class="space-y-4">
                    <h1 class="text-lg text-center font-bold leading-tight tracking-tight text-gray-900 md:text-xl dark:text-white">
                        {{ __('messages.register.Title') }} 
                    </h1>
                    <x-message-component />
                    <form class="space-y-4" action="/auth/register" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.first_name') }}</label>
                                <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.register.h_first_name') }}" required="">
                            </div>
                            <div>
                                <label for="last_name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.last_name') }}</label>
                                <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.register.h_last_name') }}" required="">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="id_number" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.passport') }}</label>
                                <input type="text" name="id_number" id="id_number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.register.h_passport') }}" required="">
                            </div>
                            <div>
                                <label for="role" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.role') }}</label>
                                <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Community">{{ __('messages.register.community') }}</option>
                                    <option value="Child">{{ __('messages.register.child') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="gender" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.gender') }}</label>
                                <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Male">{{ __('messages.register.male') }}</option>
                                    <option value="Female">{{ __('messages.register.female') }}</option>
                                </select>
                            </div>
                            <div>
                                <label for="phone_number" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.phone') }}</label>
                                <input type="number" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.register.h_phone') }}" required="">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="country" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.country') }}</label>
                                <input type="text" name="country" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.register.h_country') }}" required="">
                            </div>
                            <div>
                                <label for="address" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.address') }}</label>
                                <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.register.h_address') }}" required="">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.email') }}</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@example.com" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.password') }}</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <div>
                                <label for="confirm_password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.register.conf_pswd') }}</label>
                                <input type="password" name="confirmPassword" id="confirm_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ __('messages.register.register') }}
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            {{ __('messages.register.noAccount') }}<a href="/login" class="font-medium text-blue-600 hover:underline dark:text-blue-500">{{ __('messages.register.login') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <x-landing-page-footer />
</body>

</html>