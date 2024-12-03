<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto px-4 pb-4">
        <div class="w-auto mx-auto">
            <!-- Header -->
            <div class="text-2xl font-bold text-[#202224] mb-4">Academic Calendar</div>

            <!-- Main Content Area -->
            <div class="flex flex-col">
                <div class="flex-1 flex-col bg-white rounded-lg shadow-lg p-6 w-auto h-auto">
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
                    <div id="calendar" class="bg-white rounded-lg shadow-md max-w-full w-full h-[450px]"></div>
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
                        contentheight: 500,
                        height: 500,
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
