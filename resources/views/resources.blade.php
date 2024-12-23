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
    <div class="h-screen max-w-7xl mx-auto py-12 px-4">
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
                        <th class="text-left px-4 py-2 text-gray-600 font-medium">Info</th>
                        <th class="text-left px-4 py-2 text-gray-600 font-medium">Modified</th>
                        <th class="text-left px-4 py-2 text-gray-600 font-medium">Open</th>
                        <th class="text-left px-4 py-2 text-gray-600 font-medium">Download</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    <tr class="border-b border-gray-200">
                        <td class="px-4 py-3 flex items-center">
                            <img src="https://img.icons8.com/color/48/pdf.png" alt="PDF icon" class="w-6 h-6 mr-2">
                            <a href="#"
                                class="text-blue-500 hover:underline">Rwanda_Child_Online_Protection_Policy.pdf</a>
                        </td>
                        <td class="px-4 py-3">9MB</td>
                        <td class="px-4 py-3">May 23, 2024</td>
                        <td class="px-4 py-3 text-center">
                            <a href="#" class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1 0V7h2m-2 9a1 1 0 102 0h-2z" />
                                </svg>
                            </a>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="#" class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 16l-4-4m0 0l4-4m-4 4h12" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="px-4 py-3 flex items-center">
                            <img src="https://img.icons8.com/color/48/pdf.png" alt="PDF icon" class="w-6 h-6 mr-2">
                            <a href="#" class="text-blue-500 hover:underline">Integrated_Child_Rights_Policy.pdf</a>
                        </td>
                        <td class="px-4 py-3">9MB</td>
                        <td class="px-4 py-3">May 23, 2024</td>
                        <td class="px-4 py-3 text-center">
                            <a href="#" class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1 0V7h2m-2 9a1 1 0 102 0h-2z" />
                                </svg>
                            </a>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="#" class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 16l-4-4m0 0l4-4m-4 4h12" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <x-landing-page-footer />
</body>

</html>