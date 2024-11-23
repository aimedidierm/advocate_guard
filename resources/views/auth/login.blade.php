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

        .login-image {
            flex: 1;
            display: block;
            height: 100%;
            background-image: url('/images/hero.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 8px;
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
        <div class="login-container">
            <div class="login-form neumorphism">
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                    Sign in to your account
                </h1>
                <x-message-component />
                <form class="space-y-4 md:space-y-6" action="/auth/login" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            email</label>
                        <input type="email" name="email" id="email" placeholder="name@example.com" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                    </div>
                    <button type="submit">Sign in</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet? <a href="/auth/login"
                            class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a>
                    </p>
                </form>
            </div>
            <div class="login-image"></div>
        </div>
    </section>
</body>

</html>