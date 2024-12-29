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
            <h1 class="text-2xl font-bold text-gray-800">Our Resources</h1>
            <p class="text-gray-600 mt-4">
                Search through a collection of child protection policies and legislation in Rwanda.
            </p>
        </div>
        <div class="bg-white shadow-md rounded-lg mt-8 overflow-hidden">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">Documents</h2>
            </div>
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left px-4 py-2 text-gray-600 font-medium">Title</th>
                        {{-- <th class="text-left px-4 py-2 text-gray-600 font-medium">Info</th> --}}
                        <th class="text-left px-4 py-2 text-gray-600 font-medium">Modified</th>
                        <th class="text-left px-4 py-2 text-gray-600 font-medium">Open</th>
                        <th class="text-left px-4 py-2 text-gray-600 font-medium">Download</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($pdfFiles as $file)
                    @php
                    $filePath = Storage::url($file);
                    $fileName = basename($file);
                    // $fileSize = Storage::size($file);
                    // $formattedSize = number_format($fileSize / 1024, 2) . ' KB';
                    // $fileDate = Storage::lastModified($file);
                    // $formattedDate = date('F j, Y', $fileDate);
                    @endphp
                    <tr class="border-b border-gray-200">
                        <td class="px-4 py-3 flex items-center">
                            <img src="https://img.icons8.com/color/48/pdf.png" alt="PDF icon" class="w-6 h-6 mr-2">
                            <a href="{{ $filePath }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $fileName }}
                            </a>
                        </td>
                        {{-- <td class="px-4 py-3">9MB</td> --}}
                        <td class="px-4 py-3">Dec 29, 2024</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ $filePath }}" target="_blank" class="text-blue-500 hover:text-blue-600">
                                <svg class="w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 19V6a1 1 0 0 1 1-1h4.032a1 1 0 0 1 .768.36l1.9 2.28a1 1 0 0 0 .768.36H16a1 1 0 0 1 1 1v1M3 19l3-8h15l-3 8H3Z" />
                                </svg>
                            </a>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ $filePath }}" download class="text-blue-500 hover:text-blue-600">
                                <svg class="w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-landing-page-footer />
</body>

</html>