@extends('layout')

@section('content')

<x-community-navbar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex justify-between">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                __('messages.childreport.title') }}</h5>
            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                {{ __('messages.childreport.createbtn') }}
            </button>
        </div>
        <x-message-component />
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 z-50 hidden w-full p-4 overflow-y-auto">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{
                            __('messages.childreport.subtitle') }}</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
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
                        <form action="/community/reporting" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-6">
                                <label for="type_abuse"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{
                                    __('messages.childreport.category') }}</label>
                                <select name="type_abuse" id="type_abuse" onchange="updateDescription()"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="" disabled selected>--{{ __('messages.childreport.categorySelect')
                                        }}--</option>
                                    <option value="Physical abuse">{{ __('messages.childreport.physical') }}</option>
                                    <option value="Emotional abuse">{{ __('messages.childreport.emotion') }}</option>
                                    <option value="Neglect">{{ __('messages.childreport.neglect') }}</option>
                                    <option value="Sexual abuse">{{ __('messages.childreport.sexual') }}</option>
                                </select>
                            </div>
                            <div id="abuse-description" class="mt-2 text-sm text-gray-600 dark:text-gray-400"></div>
                            <div class="mb-6">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{
                                    __('messages.childreport.description') }}</label>
                                <textarea id="description" name="description"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required></textarea>
                            </div>
                            <div class="mb-6">
                                <label for="province"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{
                                    __('messages.childreport.province') }}</label>
                                <select name="province" id="province" onchange="updateDistricts()"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="" disabled selected>--{{ __('messages.childreport.provinceSelect')
                                        }}--</option>
                                    <option value="Kigali">Kigali</option>
                                    <option value="Northern Province"> {{ __('messages.childreport.northern') }}
                                    </option>
                                    <option value="Southern Province"> {{ __('messages.childreport.southern') }}
                                    </option>
                                    <option value="Eastern Province"> {{ __('messages.childreport.eastern') }} </option>
                                    <option value="Western Province"> {{ __('messages.childreport.western') }} </option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label for="district"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{
                                    __('messages.childreport.district') }}</label>
                                <select name="district" id="district"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="" disabled selected>--{{ __('messages.childreport.districtSelect')
                                        }}--</option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label for="sector"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{
                                    __('messages.childreport.sector') }}</label>
                                <select name="sector" id="sector"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="" disabled selected>--{{ __('messages.childreport.sectorSelect') }}--
                                    </option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="date_incident"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{
                                    __('messages.childreport.date_incident') }}</label>
                                <input type="date" id="date_incident" name="date_incident"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="attachments"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{
                                    __('messages.childreport.attachment') }}</label>
                                <input type="file" id="attachments" name="attachments[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    multiple>
                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ __('messages.childreport.reportbtn') }}</button>
                            <script>
                                function updateDescription() {
                                const descriptionElement = document.getElementById('abuse-description');
                                  const typeAbuse = document.getElementById('type_abuse').value;

                              const descriptions = {
                                "Physical abuse": "{{ __('messages.childreport.physical_abuse') }}",
                           "Emotional abuse": "{{ __('messages.childreport.emotional_abuse') }}",
                          "Neglect": "{{ __('messages.childreport.neglect_abuse') }}",
                         "Sexual abuse": "{{ __('messages.childreport.sexual_abuse') }}"
                        };

                          descriptionElement.textContent = descriptions[typeAbuse] || '';
                          }
                            </script>
                            <script>
                                const districts = {
        "Kigali": [
            { name: "Gasabo", sectors: ["Bumbogo", "Gatsata", "Jali", "Gikomero", "Gisozi", "Jabana", "Kinyinya", "Ndera", "Nduba", "Rusororo", "Rutunga", "Kacyiru", "Kimihurura", "Kimironko", "Remera"] },
            { name: "Nyarugenge", sectors: ["Gitega", "Kanyinya", "Kigali", "Kimisagara", "Mageragere", "Muhima", "Nyakabanda", "Nyamirambo", "Nyarugenge", "Rwezamenyo"] },
            { name: "Kicukiro", sectors: ["Gahanga", "Gatenga", "Gikondo", "Kagarama", "Kanombe", "Kicukiro", "Kigarama", "Masaka", "Niboye", "Nyarugunga"] }
        ],
        "Northern Province": [
            { name: "Musanze", sectors: ["Busogo", "Cyuve", "Gacaca", "Gashaki", "Gataraga", "Kimonyi", "Kinigi", "Muhoza", "Muko", "Musanze", "Nkotsi", "Nyange", "Remera", "Rwaza", "Shingiro"] },
            { name: "Rulindo", sectors: ["Base", "Burega", "Bushoki", "Buyoga", "Cyinzuzi", "Cyungo", "Kinihira", "Kisaro", "Masoro", "Mbogo", "Murambi", "Ngoma", "Ntarabana", "Rukozo", "Rusiga", "Shyorongi", "Tumba"] },
            { name: "Burera", sectors: ["Bungwe", "Butaro", "Cyanika", "Cyeru", "Gahunga", "Gatebe", "Gitovu", "Kagogo", "Kinoni", "Kinyababa", "Kivuye", "Nemba", "Rugarama", "Rugendabari", "Ruhunde", "Rusarabuye", "Rwerere"] },
            { name: "Gicumbi", sectors: ["Bukure", "Bwisige", "Byumba", "Cyumba", "Giti", "Kaniga", "Manyagiro", "Miyove", "Kageyo", "Mukarange", "Muko", "Mutete", "Nyamiyaga", "Nyankenke II", "Rubaya", "Rukomo", "Rushaki", "Rutare", "Ruvune", "Rwamiko", "Shangasha"] },
            { name: "Gakenke", sectors: ["Busengo", "Coko", "Cyabingo", "Gakenke", "Gashenyi", "Mugunga", "Janja", "Kamubuga", "Karambo", "Kivuruga", "Mataba", "Minazi", "Muhondo", "Muyongwe", "Muzo", "Nemba", "Ruli", "Rusasa", "Rushashi"] }
            
        ],
        "Southern Province": [
            { name: "Huye", sectors: ["Ngoma", "Kibaya", "Rango"] },
            { name: "Nyamagabe", sectors: ["Gasaka", "Kamegeri", "Tare"] }
        ],
        "Eastern Province": [
            { name: "Rwamagana", sectors: ["Gahengeri", "Muhazi", "Nyakariro"] },
            { name: "Kayonza", sectors: ["Kibungo", "Mukarange", "Nyamirama"] }
        ],
        "Western Province": [
            { name: "Rubavu", sectors: ["Gisenyi", "Nyundo", "Kanama"] },
            { name: "Nyabihu", sectors: ["Bwishyura", "Jenda", "Mukamira"] }
        ]
    };

    function updateDistricts() {
        const provinceSelect = document.getElementById('province');
        const districtSelect = document.getElementById('district');
        const sectorSelect = document.getElementById('sector');

        // Clear previous options
        districtSelect.innerHTML = '<option value="" disabled selected>--Select District--</option>';
        sectorSelect.innerHTML = '<option value="" disabled selected>--Select Sector--</option>';

        const selectedProvince = provinceSelect.value;

        if (selectedProvince) {
            const districtOptions = districts[selectedProvince];

            districtOptions.forEach(district => {
                const option = document.createElement('option');
                option.value = district.name;
                option.textContent = district.name;
                districtSelect.appendChild(option);
            });
        }
    }

    document.getElementById('district').addEventListener('change', function() {
        const selectedDistrict = this.value;
        const sectorSelect = document.getElementById('sector');
        
        // Clear previous sector options
        sectorSelect.innerHTML = '<option value="" disabled selected>--Select Sector--</option>';

        const provinceSelect = document.getElementById('province').value;
        const districtOptions = districts[provinceSelect];

        const selectedDistrictDetails = districtOptions.find(d => d.name === selectedDistrict);
        
        if (selectedDistrictDetails) {
            selectedDistrictDetails.sectors.forEach(sector => {
                const option = document.createElement('option');
                option.value = sector;
                option.textContent = sector;
                sectorSelect.appendChild(option);
            });
        }
    });
                            </script>
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
                        <th scope="col" class="px-6 py-3"> {{ __('messages.childreport.dateList') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('messages.childreport.categoryList') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('messages.childreport.provinceList') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('messages.childreport.districtList') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('messages.childreport.sectorList') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('messages.childreport.status') }}</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($reports->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th colspan="6" scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">No
                            data</th>
                    </tr>
                    @else
                    @foreach ($reports as $item)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->created_at}}
                        </th>
                        <td class="px-6 py-4">{{$item->type_abuse}}</td>
                        <td class="px-6 py-4">{{$item->province}}</td>
                        <td class="px-6 py-4">{{$item->district}}</td>
                        <td class="px-6 py-4">{{$item->sector}}</td>
                        <td class="px-6 py-4">{{$item->status}}</td>
                        <td class="flex px-6 py-4">
                            <a href="/community/reporting/{{$item->id}}"
                                class="px-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">{{
                                __('messages.childreport.more') }}</a>
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
                @if ($reports->onFirstPage())
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
                    <a href="{{ $reports->previousPageUrl() }}"
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
                @foreach ($reports->links()->elements as $element)
                @if (is_string($element))
                <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded">{{ $element }}</span>
                @endif

                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $reports->currentPage())
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

                @if ($reports->hasMorePages())
                <li>
                    <a href="{{ $reports->nextPageUrl() }}"
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
@stop