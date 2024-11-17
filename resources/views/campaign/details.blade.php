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
    <header class="bg-cover bg-center h-96" style="background-image: url('/images/image.png');">
        <div class="bg-green-800 bg-opacity-50 h-full flex flex-col justify-center items-center text-center">
            <h1 class="text-4xl font-bold">{{$campaign->name}}</h1>
        </div>
    </header>

    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Campaign Objective</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            {{$campaign->objective}}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Budget Resources</h3>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach(json_decode($campaign->budget_resources, true) as $index => $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Timeline</h3>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach(json_decode($campaign->timeline, true) as $index => $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Role Responsibilities</h3>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach(json_decode($campaign->role_responsibilities, true) as $index => $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <br>

    <x-landing-page-footer />
</body>

</html>