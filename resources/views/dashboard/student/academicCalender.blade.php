<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="w-full lg:w-3/4 mx-auto">
            <!-- Header -->
            <div class="text-2xl font-bold text-black mb-8">Academic Calendar</div>
            <div class="flex flex-col bg-white rounded-lg shadow-lg p-6 w-full">
                <!-- Calendar Header -->
                <div class="flex justify-between items-center pb-2 mb-4">
                    <!-- Previous Button and Title Section -->
                    <div class="flex items-center w-full justify-between">
                        <button id="prev-btn" class="text-black font-semibold py-1 px-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"
                                fill="currentColor" class="w-8 h-8">
                                <path
                                    d="M11.3,12l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2l0,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.2,0.2,0.4,0.3,0.7,0.3l0,0c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L11.3,12z">
                                </path>
                            </svg>
                        </button>

                        <!-- Calendar Title in the center -->
                        <div class="text-xl font-bold text-black mx-4 text-center flex-1" id="calendar-title">
                        </div>

                        <button id="next-btn" class="text-black font-semibold py-1 px-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8">
                                <path
                                    d="M15.54,11.29,9.88,5.64a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.95,5L8.46,17a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l5.66-5.65A1,1,0,0,0,15.54,11.29Z">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <!-- View Mode Buttons -->
                    <div class="flex items-center justify-center space-x-6 w-full mt-2">
                        <button class="calendar-view-btn text-lg font-bold py-2 px-3 rounded-lg w-full text-center"
                            id="day-view">Day</button>
                        <button class="calendar-view-btn text-lg font-bold py-2 px-3 rounded-lg w-full text-center"
                            id="week-view">Week</button>
                        <button class="calendar-view-btn text-lg font-bold py-2 px-3 rounded-lg w-full text-center"
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
                    activeButton.classList.add('bg-blue-500', 'text-white', 'px-3', 'py-1', 'rounded-lg');
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
