<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <div class="w-full lg:w-3/4 mx-auto">
            <!-- Header -->
            <div class="text-2xl font-bold text-[#202224] mb-8">Academic Calendar</div>

            <!-- Main Content Area -->
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Left Section for Events -->
                <div class="flex flex-col bg-white rounded-lg shadow-lg p-6 border border-gray-300 w-full lg:w-1/3">
                    <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mb-6">
                        + Add New Event
                    </button>
                    <div class="text-lg font-bold text-[#202224] mb-4">You are going to</div>

                    <div class="space-y-6">
                        <!-- Event Item -->
                        <div class="flex items-start space-x-4">
                            <img class="w-12 h-12 rounded-full" src="https://via.placeholder.com/62x62" alt="Event Image">
                            <div>
                                <div class="font-bold text-sm">Design Conference</div>
                                <div class="text-gray-500 text-xs">Today 07:19 AM</div>
                                <div class="text-gray-500 text-xs">56 Davion Mission Suite 157</div>
                                <div class="text-gray-500 text-xs">Meaghanberg</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <img class="w-12 h-12 rounded-full" src="https://via.placeholder.com/62x62" alt="Event Image">
                            <div>
                                <div class="font-bold text-sm">Weekend Festival</div>
                                <div class="text-gray-500 text-xs">16 October 2019 at 5:00 PM</div>
                                <div class="text-gray-500 text-xs">853 Moore Flats Suite 158, Sweden</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <img class="w-12 h-12 rounded-full" src="https://via.placeholder.com/62x62" alt="Event Image">
                            <div>
                                <div class="font-bold text-sm">Glastonbury Festival</div>
                                <div class="text-gray-500 text-xs">20-22 October 2019 at 8:00 PM</div>
                                <div class="text-gray-500 text-xs">646 Walter Road Apt. 571, Turks and Caicos Islands</div>
                            </div>
                        </div>
                    </div>

                    <button class="bg-gray-200 text-[#202224] font-bold py-2 px-4 rounded-lg mt-6">
                        See More
                    </button>
                </div>

                <!-- Right Section for Calendar -->
                <div class="flex flex-col bg-white rounded-lg shadow-lg p-6 border border-gray-300 w-full lg:w-2/3">
                    <!-- Calendar Header -->
                    <div class="flex justify-between items-center border-b pb-2 mb-4">
                        <div class="text-xl font-bold text-[#202224]">October 2019</div>
                        <div class="flex items-center space-x-4">
                            <button class="text-xs font-semibold">Day</button>
                            <button class="text-xs font-semibold">Week</button>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs font-semibold">Month</button>
                        </div>
                    </div>

                    <!-- Calendar Grid -->
                    <div class="grid grid-cols-7 gap-4 text-center">
                        <!-- Days of the Week Header -->
                        <div class="font-bold text-xs">MON</div>
                        <div class="font-bold text-xs">TUE</div>
                        <div class="font-bold text-xs">WED</div>
                        <div class="font-bold text-xs">THU</div>
                        <div class="font-bold text-xs">FRI</div>
                        <div class="font-bold text-xs">SAT</div>
                        <div class="font-bold text-xs">SUN</div>

                        <!-- Fill in Calendar Dates with Events -->
                        <!-- Example Days with Events -->
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm text-gray-400">30</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">1</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">2</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">3</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">4</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">5</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">6</div>

                        <!-- Another week -->
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">7</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">8</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">9</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">10</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">11</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">12</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">13</div>

                        <!-- Event Highlight -->
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">14</div>
                        <div class="relative flex items-center justify-center bg-purple-200 h-16 rounded-lg text-sm">
                            15
                            <span class="absolute top-10 text-xs bg-purple-300 text-purple-700 rounded px-1">Design Conf</span>
                        </div>
                        <div class="relative flex items-center justify-center bg-pink-200 h-16 rounded-lg text-sm">
                            16
                            <span class="absolute top-10 text-xs bg-pink-300 text-pink-700 rounded px-1">Weekend Fest</span>
                        </div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">17</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">18</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">19</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">20</div>

                        <!-- Another Event -->
                        <div class="relative flex items-center justify-center bg-orange-200 h-16 rounded-lg text-sm">
                            21
                            <span class="absolute top-10 text-xs bg-orange-300 text-orange-700 rounded px-1">Glastonbury</span>
                        </div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">22</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">23</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">24</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">25</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">26</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">27</div>

                        <!-- Remainder of the Month -->
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">28</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">29</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm">30</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm text-gray-400">1</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm text-gray-400">2</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm text-gray-400">3</div>
                        <div class="flex items-center justify-center h-16 rounded-lg text-sm text-gray-400">4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
