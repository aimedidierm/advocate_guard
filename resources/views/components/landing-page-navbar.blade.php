<header class="bg-black text-white py-3">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="/" class="text-sm">{{ __('messages.landingpage.question') }}</a>
            <span class="text-sm">|</span>
            <span class="text-sm">711</span>
            <span class="text-sm">|</span>
            <a href="mailto:info@ncda.gov.rw" class="text-sm">info@ncda.gov.rw</a>
        </div>
        <div class="flex items-center space-x-4 mt-2 md:mt-0">
            <a href="/login" class="text-sm">{{ __('messages.landingpage.login') }}</a>
            <a href="/auth/register" class="text-sm">{{ __('messages.landingpage.logout') }}</a>
            @if (session('locale') == 'rw')
            <a href="{{ url('/switch-language/en') }}" class="text-sm">English</a>
            @else
            <a href="{{ url('/switch-language/rw') }}" class="text-sm">Kinyarwanda</a>
            @endif
        </div>
    </div>
</header>
<nav class="bg-white shadow">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/">
            <h1 class="text-2xl font-bold text-black">{{env('APP_NAME')}}</h1>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row md:space-x-8 text-black mt-4 md:mt-0">
                <li><a href="/" class="text-sm">{{ __('messages.landingpage.home') }}</a></li>
                <li><a href="/#" class="text-sm">{{ __('messages.landingpage.e-learning') }}</a></li>
                <li><a href="/our-policy" class="text-sm">{{ __('messages.landingpage.our-policy') }}</a></li>
                <li><a href="/#" class="text-sm">{{ __('messages.landingpage.report-abuse') }}</a></li>
                <li><a href="/campaign" class="text-sm">{{ __('messages.landingpage.campaign') }}</a></li>
                <li><a href="/about-us" class="text-sm">{{ __('messages.landingpage.about-us') }}</a></li>
                <li><a href="/contact-us" class="text-sm">{{ __('messages.landingpage.contact') }}</a></li>
                <a href="#" class="mt-4 md:mt-0 px-4 py-2 bg-blue-500 text-white rounded">
                    {{__('messages.landingpage.donate')}}
                </a>
            </ul>
        </div>
    </div>
</nav>