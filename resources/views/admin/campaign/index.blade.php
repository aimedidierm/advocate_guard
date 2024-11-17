@extends('layout')

@section('content')

<x-admin-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">Campaign management</h5>

        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Create new
        </button>
        <x-message-component />

        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Create new campaign
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-6 space-y-6">

                        <form action="/admin/campaign" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Name</label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="objective"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Objective</label>
                                <textarea type="text" id="objective" name="objective"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                </textarea>
                            </div>
                            <div class="w-fullpx-3 mb-6 md:mb-0">
                                <label for="goals-wrapper"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Goal</label>
                                <div id="goals-wrapper">
                                    <input type="text" name="goals[]" placeholder="Goal 1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <button type="button" onclick="addGoals()" class="text-blue-500 text-sm">+ Add
                                    More
                                    Goals</button>
                            </div>
                            <br>
                            <div class="w-fullpx-3 mb-6 md:mb-0">
                                <label for="target_audience-wrapper"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target
                                    Audience</label>
                                <div id="target_audience-wrapper">
                                    <input type="text" name="target_audience[]" placeholder="Target audience 1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <button type="button" onclick="addTargetAudience()" class="text-blue-500 text-sm">+ Add
                                    More
                                    Target Audience</button>
                            </div>
                            <br>
                            <div class="w-fullpx-3 mb-6 md:mb-0">
                                <label for="budget_resources-wrapper"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Budget
                                    Resources</label>
                                <div id="budget_resources-wrapper">
                                    <input type="text" name="budget_resources[]" placeholder="Budget Resources 1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <button type="button" onclick="addBudgetResources()" class="text-blue-500 text-sm">+ Add
                                    More
                                    Budget Resources</button>
                            </div>
                            <br>
                            <div class="w-fullpx-3 mb-6 md:mb-0">
                                <label for="timeline-wrapper"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Timeline</label>
                                <div id="timeline-wrapper">
                                    <input type="text" name="timeline[]" placeholder="Phase 1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <button type="button" onclick="addTimeline()" class="text-blue-500 text-sm">+ Add
                                    More
                                    Phases</button>
                            </div>
                            <br>
                            <div class="w-fullpx-3 mb-6 md:mb-0">
                                <label for="role_responsibilities-wrapper"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role
                                    Responsibilities</label>
                                <div id="role_responsibilities-wrapper">
                                    <input type="text" name="role_responsibilities[]"
                                        placeholder="Role Responsibilities 1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <button type="button" onclick="addRoleResponsibilities()"
                                    class="text-blue-500 text-sm">+ Add
                                    More
                                    Role Responsibilities</button>
                            </div>
                            <br>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                campaign</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stage
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($campaigns->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th colspan="3" scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            No data
                        </th>
                    </tr>
                    @else
                    @foreach ($campaigns as $item)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->stage}}
                        </td>
                        <td class="flex px-6 py-4">
                            <a href="/admin/campaign/{{$item->id}}"
                                class="px-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">More</a>
                            <form action="/admin/campaign/{{$item->id}}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this lesson?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                            @if ($item->stage == App\Enums\CampaignStage::PLANNING->value)
                            <a href="/admin/campaign-launch/{{$item->id}}"
                                class="px-2 font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Launch</a>
                            @else

                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <br>
        <nav aria-label="Page navigation example">
            <ul class="flex items-center -space-x-px h-10 text-base">
                @if ($campaigns->onFirstPage())
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ $campaigns->previousPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>
                @endif
                @foreach ($campaigns->links()->elements as $element)
                @if (is_string($element))
                <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded">{{ $element }}</span>
                @endif

                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $campaigns->currentPage())
                <li>
                    <a href="#" aria-current="page"
                        class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{
                        $page }}</a>
                </li>
                @else
                <li>
                    <a href="{{ $url }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{
                        $page }}</a>
                </li>
                @endif
                @endforeach
                @endif
                @endforeach

                @if ($campaigns->hasMorePages())
                <li>
                    <a href="{{ $campaigns->nextPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
                @else
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<script>
    function addGoals() {
        const wrapper = document.getElementById('goals-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'goals[]';
        input.placeholder = `Goal ${wrapper.children.length + 1}`;
        input.classList = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
        wrapper.appendChild(input);
    }

    function addTargetAudience() {
        const wrapper = document.getElementById('target_audience-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'target_audience[]';
        input.placeholder = `Target audience ${wrapper.children.length + 1}`;
        input.classList = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
        wrapper.appendChild(input);
    }

    function addBudgetResources() {
        const wrapper = document.getElementById('budget_resources-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'budget_resources[]';
        input.placeholder = `Budget Resources ${wrapper.children.length + 1}`;
        input.classList = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
        wrapper.appendChild(input);
    }

    function addTimeline() {
        const wrapper = document.getElementById('timeline-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'timeline[]';
        input.placeholder = `Phase ${wrapper.children.length + 1}`;
        input.classList = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
        wrapper.appendChild(input);
    }

    function addRoleResponsibilities() {
        const wrapper = document.getElementById('role_responsibilities-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'role_responsibilities[]';
        input.placeholder = `Role Responsibilities ${wrapper.children.length + 1}`;
        input.classList = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
        wrapper.appendChild(input);
    }
</script>
@stop