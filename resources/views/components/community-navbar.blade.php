<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="separator-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul cass="space-y-2 font-medium">
            <li>
                <img src="/images/logo.png" alt="Logo">
            </li>
            <li>
                <a href="/community"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <span class="ml-3">{{ __('messages.community.dashboard') }}</span>
                </a>
            </li>
            <li>
                <a href="/community/reporting"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        summarize
                    </span>
                    <span class="ml-3">{{ __('messages.community.reporting') }}</span>
                </a>
            </li>
            <li>
                <a href="/community/e-learning"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        menu_book
                    </span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ __('messages.community.e-learning') }}</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <span class="material-symbols-outlined">
                        file_copy
                    </span>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ __('messages.community.survey') }}</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/community/survey"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            {{ __('messages.community.allsurvey') }}</a>
                    </li>
                    <li>
                        <a href="/community/survey-answers"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ __('messages.admin.answers') }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/platform"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        contact_mail
                    </span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ __('messages.community.community') }}</span>
                </a>
            </li>
            <li>
                <a href="/community/settings"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        manage_accounts
                    </span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ __('messages.community.setting') }}</span>
                </a>
            </li>
            <li>
                <a href="/auth/logout"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ __('messages.community.signout') }}</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
             <li>
                <a href="
                            @if (session('locale') == 'rw')
                                    {{ url('/switch-language/en') }} @else {{ url('/switch-language/rw') }}
                            @endif
                            " class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
                            dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        translate
                    </span>
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        @if (session('locale') == 'rw')
                        {{ __('messages.community.english') }}
                        @else
                        {{ __('messages.community.kinyarwanda') }}
                        @endif
                    </span>
                </a>
            </li> 
            <li>
                <a href="#" id="theme-toggle"
                    class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-3" id="theme-toggle-dark-icon">
                        {{ __('messages.dashboard-sidebar.change-theme')}}
                    </span>
                </a>
            </li>
        </ul>
    </div>
</aside>