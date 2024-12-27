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
    <section class="container mx-auto px-6 py-12 h-screen">
        <br>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($campaigns as $campaign)
            <div
                class="bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="/images/campaign.png" alt="Tour 1" class="object-cover" style="height: 6cm; width: 100%">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">{{$campaign->name}}</h3>
                    <p class="text-gray-600 mt-2">{{$campaign->objective}}</p>
                    <a href="/campaign-details/{{$campaign->id}}"
                        class="text-green-600 hover:text-green-700 mt-4 inline-block"> {{ __('messages.campaignhome.learnmore') }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <x-landing-page-footer />
</body>

</html>