<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .neumorphism {
            background: #f0f0f0;
            box-shadow: 8px 8px 16px #d9d9d9, -8px -8px 16px #ffffff;
        }

        .glassmorphism {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 1rem;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin-right: 2rem;
        }

        input,
        button {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0;
            border-radius: 8px;
            font-size: 1rem;
        }

        button {
            background-color: #317fac;
            color: white;
            cursor: pointer;
            border: none;
        }

        button:hover {
            background-color: #4565a0;
        }
    </style>
</head>

<body>
    <x-landing-page-navbar />
    
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex items-center justify-center min-h-screen bg-cover bg-center"
            style="background-image: url('/images/bg3.jpeg');">
            <div class=" w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow dark:bg-gray-800">
                <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white">
                {{ __('messages.login.signTitle') }}
                </h1>
                <x-message-component />
                <form class="space-y-4 md:space-y-6" action="/auth/login" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.login.email') }}
                            </label>
                        <input type="email" name="email" id="email" placeholder="name@example.com" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.login.password') }}</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">{{ __('messages.login.sign') }}
                        </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                       {{ __('messages.login.noAccount') }}<a href="/auth/register"
                            class="font-medium text-blue-600 hover:underline dark:text-blue-500">{{ __('messages.login.Signup') }}</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
    <x-landing-page-footer />
</body>

</html>