<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <x-landing-page-navbar />
    <div class="max-w-7xl mx-auto py-12 px-4">

        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800">Policy Advocacy Resources</h1>
            <p class="text-gray-600 mt-4">
                Access a variety of resources to gain more knowledge about advocacy efforts in child protection.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">

            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h2 class="text-xl font-bold text-gray-800">Policy Library</h2>
                <p class="text-gray-600 mt-4">
                    Search through a collection of child protection policies and legislation in Rwanda.
                </p>
                <button class="mt-6 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    View Library
                </button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h2 class="text-xl font-bold text-gray-800">Policy Brief Templates</h2>
                <p class="text-gray-600 mt-4">
                    Download pre-formatted templates to help you create effective policy briefs.
                </p>
                <button class="mt-6 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    View Templates
                </button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h2 class="text-xl font-bold text-gray-800">Fact Sheets & Talking Points</h2>
                <p class="text-gray-600 mt-4">
                    Get concise information on various child protection issues.
                </p>
                <button class="mt-6 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    Access Facts Sheet
                </button>
            </div>
        </div>

        <div class="mt-12 text-center">
            <h2 class="text-xl font-bold text-gray-800">Best Practices & Case Studies</h2>
            <p class="text-gray-600 mt-4">
                Learn from successful advocacy campaigns and their impact.
            </p>
            <button class="mt-6 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                Read Case Studies
            </button>
        </div>
    </div>
    <x-landing-page-footer />
</body>