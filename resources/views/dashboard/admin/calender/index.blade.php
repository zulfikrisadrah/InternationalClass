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
                                <div class="text-gray-500 text-xs">16 October 2024 at 5:00 PM</div>
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
                        <div class="text-xl font-bold text-[#202224]" id="calendar-title">October</div>
                        <div class="flex items-center space-x-4">
                            <button class="text-xs font-semibold" id="day-view">Day</button>
                            <button class="text-xs font-semibold" id="week-view">Week</button>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs font-semibold" id="month-view">Month</button>
                        </div>
                    </div>

                    <!-- FullCalendar will be injected here -->
                    <div id="calendar" class="bg-white rounded-lg shadow-md"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- Add FullCalendar JS and CSS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: false, // Disable default toolbar
                events: '/calendar/events',
                eventsContent: function(arg) {
                    // Custom event rendering, you can format the text here if needed
                    return {
                        html: `<div class="text-xs font-bold text-white">${arg.event.title}</div>`
                    }
                },
                eventClick: function(info) {
                    alert('Event: ' + info.event.title);
                },
            });

            calendar.render();

            // Change view on button click
            document.getElementById('day-view').addEventListener('click', function() {
                calendar.changeView('timeGridDay');
            });

            document.getElementById('week-view').addEventListener('click', function() {
                calendar.changeView('timeGridWeek');
            });

            document.getElementById('month-view').addEventListener('click', function() {
                calendar.changeView('dayGridMonth');
            });

            eventAdd: function(info) {
                    var title = prompt('Enter event title:');
                    if (title) {
                        axios.post('/calendar/events', {
                            title: title,
                            start: info.event.start.toISOString(),
                            end: info.event.end.toISOString()
                        }).then(response => {
                            alert('Event added successfully');
                        }).catch(error => {
                            console.error(error);
                            alert('Failed to add event');
                        });
                    }
                }
        });
    </script>

</x-app-layout>
