<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        .neumorphism {
            background: #f0f0f0;
            box-shadow: 8px 8px 16px #d9d9d9, -8px -8px 16px #ffffff;
        }

        .glassmorphism {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>
    <x-landing-page-navbar />

    <section class="relative bg-cover bg-center h-screen" style="background-image: url('/images/hero.jpg');">
        <div
            class="container mx-auto h-full flex flex-col justify-center items-center text-center text-white bg-opacity-75">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <img src="/images/logo.png" alt="NCDA Logo" class="relative">
            <h1 class="text-4xl font-bold relative">Umuvugizi</h1>
            <h2 class="text-xl font-bold relative">Rinda uburenganzira bw’ Umwana mu Rwanda</h2>
        </div>
    </section>

    <x-landing-page-footer />
</body>

</html>