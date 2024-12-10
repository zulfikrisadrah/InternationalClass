<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="w-full lg:w-3/4 mx-auto">
            <!-- Main Content Area -->
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Left Section for Events -->
                <div class="flex flex-col bg-white rounded-lg shadow-lg p-6 w-fit h-fit lg:w-1/3">
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
                <div class="flex-1 flex-col bg-white rounded-lg shadow-lg p-6 max-w-full h-full lg:w-2/3">
                    <!-- Calendar Header -->
                    <div class="flex justify-between items-center pb-2 mb-4">
                        <!-- Previous Button and Title Section -->
                        <div class="flex items-center w-full justify-between">
                            <div class="flex">
                                <button id="prev-btn" class="text-black px-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-8 h-8">
                                        <path
                                            d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z">
                                        </path>
                                    </svg>
                                </button>

                                <!-- Calendar Title in the center -->
                                <div class="text-xl font-bold text-black text-center" id="calendar-title">
                                </div>

                                <button id="next-btn" class="text-black px-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-8 h-8">
                                        <path
                                            d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- View Mode Buttons -->
                        <div class="flex items-center space-x-2 mt-2">
                            <button class="calendar-view-btn text-lg font-bold py-1 px-2 rounded-lg w-full text-center"
                                id="day-view">Day</button>
                            <button class="calendar-view-btn text-lg font-bold py-1 px-2 rounded-lg w-full text-center"
                                id="week-view">Week</button>
                            <button class="calendar-view-btn text-lg font-bold py-1 px-2 rounded-lg w-full text-center"
                                id="month-view">Month</button>
                        </div>
                    </div>

                    <!-- FullCalendar will be injected here -->
                    <div id="calendar" class="bg-white rounded-lg shadow-md h-[600px] w-full"></div>
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
                        // Update title dynamically based on view change
                        dateDidMount: function(info) {
                            // This is used to update the title based on the view
                            updateCalendarTitle(calendar.view.title);
                        },
                        viewDidMount: function(info) {
                            // This also triggers when the view is mounted
                            updateCalendarTitle(info.view.title);
                        },
                        datesSet: function() {
                            updateCalendarTitle(calendar.view.title);
                        },
                    });

                    calendar.render();

                    // Function to change active button style
                    function setActiveButton(activeButton) {
                        // Reset all buttons' background color
                        const buttons = document.querySelectorAll('.calendar-view-btn');
                        buttons.forEach(button => {
                            button.classList.remove('bg-blue-500', 'text-white');
                            button.classList.add('text-sm', 'font-semibold', 'py-1', 'px-3', 'rounded-lg',
                                'text-black');
                        });

                        // Set the active button's background to blue
                        activeButton.classList.add('bg-blue-500', 'text-white', 'px-3', 'py-2', 'rounded-lg');
                    }

                    // Change view on button click and apply active class
                    document.getElementById('day-view').addEventListener('click', function() {
                        calendar.changeView('timeGridDay');
                        setActiveButton(this);
                    });

                    document.getElementById('week-view').addEventListener('click', function() {
                        calendar.changeView('timeGridWeek');
                        setActiveButton(this);
                    });

                    document.getElementById('month-view').addEventListener('click', function() {
                        calendar.changeView('dayGridMonth');
                        setActiveButton(this);
                    });

                    // Set the initial active button (Month is active by default)
                    setActiveButton(document.getElementById('month-view'));

                    function updateCalendarTitle(title) {
                        document.getElementById('calendar-title').innerText = title;
                    }
                    document.getElementById('prev-btn').addEventListener('click', function() {
                        calendar.prev();
                    });

                    // Change to next month/day
                    document.getElementById('next-btn').addEventListener('click', function() {
                        calendar.next();
                    });
                });
    </script>

</x-app-layout>
