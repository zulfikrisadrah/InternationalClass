<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>
    <section class="flex flex-col rounded-none px-6 py-6">
        <div class="w-full">
            <div class="flex gap-5 max-md:flex-col">
                <!-- Left Chart Section (First Bar) -->
                <div class="flex flex-col w-full md:w-[36%] max-md:w-full">
                    <article class="flex flex-col py-3 px-3 w-full h-full bg-white rounded-md shadow-2xl text-black">
                        <header class="flex flex-col px-4 w-full">
                            <h2 class="self-start text-lg font-medium leading-loose">Student Statistic By Years</h2>
                        </header>
                        <!-- Canvas untuk Chart.js -->
                        <div class="flex justify-center w-full mt-4">
                            <canvas id="studentChart" class="w-full h-[180px]"></canvas>
                        </div>
                    </article>
                </div>

                <!-- Right Chart Section (Second Bar) -->
                <div class="flex flex-col w-full md:w-[66%] max-md:w-full mx-auto">
                    <article class="flex flex-col py-3 px-3 mx-auto w-full bg-white rounded-md shadow-2xl">
                        <header class="flex flex-col px-4 w-full text-slate-700">
                            <h2 class="self-start text-lg font-medium leading-loose">Student Statistic</h2>
                        </header>
                        <div class="self-center mt-1.5 w-full">
                            <div class="flex gap-5 flex-wrap">
                                <!-- Grafik kedua -->
                                <div class="flex flex-col w-full md:w-[83%] mx-auto">
                                    <div class="flex flex-col w-full">
                                        <div class="flex justify-between items-center w-full">
                                            <div class="flex flex-col w-full h-[220px]">
                                                <canvas id="studentChart2" class="w-full h-full"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Second Row of Charts (Third and Fourth Bars) -->
            <div class="flex gap-5 max-md:flex-col mt-6">
                <!-- Third Chart Section -->
                <div class="flex flex-col w-full md:w-[66%] max-md:w-full mx-auto">
                    <article class="flex flex-col py-3 px-3 mx-auto w-full bg-white rounded-md shadow-2xl">
                        <header class="flex flex-col px-4 w-full text-slate-700">
                            <h2 class="self-start text-lg font-medium leading-loose">Student Statistic by IE Programs</h2>
                        </header>
                        <div class="self-center mt-1.5 w-full">
                            <div class="flex gap-5 flex-wrap">
                                <!-- Grafik keempat -->
                                <div class="flex flex-col w-full md:w-[83%] mx-auto">
                                    <div class="flex flex-col w-full">
                                        <div class="flex justify-between items-center w-full">
                                            <div class="flex flex-col w-full h-[220px]">
                                                <canvas id="studentChart4" class="w-full h-full"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Fourth Chart Section -->
                <div class="flex flex-col w-full md:w-[36%] max-md:w-full">
                    <article class="flex flex-col py-3 px-3 w-full h-full bg-white rounded-md shadow-2xl text-black">
                        <header class="flex flex-col px-4 w-full">
                            <h2 class="self-start text-lg font-medium leading-loose">IE Programs</h2>
                        </header>
                        <!-- Canvas untuk Chart.js -->
                        <div class="flex justify-center w-full mt-4 px-10">
                            <canvas id="studentChart3" class="w-full h-[180px]"></canvas>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.onload = function() {

            const batches = @json(array_keys($studentBatches));
            const counts = @json(array_values($studentBatches));
            var ctx = document.getElementById('studentChart').getContext('2d');

            var studentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: batches,
                    datasets: [{
                        label: 'Number of Students',
                        data: counts,
                        backgroundColor: 'rgba(0, 119, 225, 90)',
                        borderColor: 'rgba(0, 119, 225, 100)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const programLabels = @json($data['programLabels']);
            const chartDatasets = @json($data['chartDatasets']);
            var ctx2 = document.getElementById('studentChart2').getContext('2d');
            var studentChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: programLabels,
                    datasets: chartDatasets
                },
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var programCounts = @json($programCounts);
            if (programCounts.length > 0) {
                var chartLabels = programCounts.map(item => item.ie_program.ie_program_name);
                var chartData = programCounts.map(item => item.count);

                var ctx3 = document.getElementById('studentChart3').getContext('2d');
                var studentChart3 = new Chart(ctx3, {
                    type: 'doughnut',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: 'Number of programs',
                            data: chartData,
                            backgroundColor: [
                                'rgb(54, 162, 235)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 206, 86)',
                                'rgb(75, 192, 192)'
                            ],
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                                labels: {
                                    usePointStyle: true,
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            } else {
                console.log("No data found for the chart.");
            }


            var studentCountsByYear = @json($studentCountsByYear);
            var studentCountsLabels = studentCountsByYear.map(function(item) {
                return item.year;
            });
            var studentCountsData = studentCountsByYear.map(function(item) {
                return item.student_count;
            });
            var ctx4 = document.getElementById('studentChart4').getContext('2d');
            var studentChart4 = new Chart(ctx4, {
                type: 'line',
                data: {
                    labels: studentCountsLabels,
                    datasets: [{
                        label: 'Number of students',
                        data: studentCountsData,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            })

        };
    </script>
</x-app-layout>
