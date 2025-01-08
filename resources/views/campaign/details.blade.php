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
    <br>
    <header class="bg-cover bg-center h-20" style="background-image: url('/images/image.png');">
        <div class="bg-green-800 bg-opacity-50 h-full flex flex-col justify-center items-center text-center">
            <h1 class="text-4xl font-bold">{{$campaign->name}}</h1>
        </div>
    </header>
    @if (!$campaign->image)
    <img id="profileImagePreview" src="{{ asset('storage/' . $campaign->image) }}" alt="Campaign Image"
        class="object-cover" style="width: 100%">
    @else
    <img id="profileImagePreview" src="{{ asset('images/bg2.jpeg') }}" alt="Default Campaign Image" class="object-cover"
        style="width: 100%">
    @endif
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">{{ __('messages.campaignhome1.objective') }}</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            {{$campaign->objective}}
        </p>
    </section>
    <br>

    <x-landing-page-footer />
</body>

</html>