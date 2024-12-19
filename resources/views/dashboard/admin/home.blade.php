<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <!-- Title & Total -->
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">Student Statistics</h2>
                        <p class="text-gray-500">Total: {{ array_sum(array_values($data['studentBatches'])) }} Students
                        </p>
                    </div>

                    <!-- Filter Cards -->
                    <div class="flex gap-3">
                        <!-- All Students -->
                        <a href="{{ route('dashboard', ['status' => 'all']) }}"
                            class="card bg-white hover:shadow-lg transition-all duration-200 cursor-pointer {{ $studentStatus === 'all' ? 'ring-2 ring-[#0077FF]' : '' }} flex-1">
                            <div class="card-body p-4 flex flex-row items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#0077FF] mr-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <p class="text-sm font-medium text-gray-600">All</p>
                            </div>
                        </a>

                        <!-- Active Students -->
                        <a href="{{ route('dashboard', ['status' => 'active']) }}"
                            class="card bg-white hover:shadow-lg transition-all duration-200 cursor-pointer {{ $studentStatus === 'active' ? 'ring-2 ring-[#16DBCC]' : '' }} flex-1">
                            <div class="card-body p-4 flex flex-row items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#16DBCC] mr-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <p class="text-sm font-medium text-gray-600">Active</p>
                            </div>
                        </a>

                        <!-- Inactive Students -->
                        <a href="{{ route('dashboard', ['status' => 'inactive']) }}"
                            class="card bg-white hover:shadow-lg transition-all duration-200 cursor-pointer {{ $studentStatus === 'inactive' ? 'ring-2 ring-[#FF82AC]' : '' }} flex-1">
                            <div class="card-body p-4 flex flex-row items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF82AC] mr-2" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M4 11.3333L0 9L12 2L24 9V17.5H22V10.1667L20 11.3333V18.0113L19.7774 18.2864C17.9457 20.5499 15.1418 22 12 22C8.85817 22 6.05429 20.5499 4.22263 18.2864L4 18.0113V11.3333ZM6 12.5V17.2917C7.46721 18.954 9.61112 20 12 20C14.3889 20 16.5328 18.954 18 17.2917V12.5L12 16L6 12.5ZM3.96927 9L12 13.6846L20.0307 9L12 4.31541L3.96927 9Z">
                                    </path>
                                </svg>
                                <p class="text-sm font-medium text-gray-600">Graduated</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Chart Section (Student Statistics by Years) -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Student Statistics by Years</h2>
                        <div class="w-full h-72">
                            <canvas id="studentChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Middle Chart Section (Student Statistics) -->
                <div class="col-span-2 card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Student Statistics By Study Programs</h2>
                        <div class="w-full h-72">
                            <canvas id="studentChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Row Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                <!-- IE Programs Statistics -->
                <div class="col-span-2 card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">IE Programs Statistics</h2>
                        <div class="w-full h-[220px]">
                            <canvas id="studentChart4"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Doughnut Chart -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">IE Programs</h2>
                        <div class="w-full h-[180px] pt-8">
                            <canvas id="studentChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            window.onload = function() {
                    // Chart 1 - Student Statistics by Years
                    const batches = @json(array_keys($data['studentBatches']));
                    const counts = @json(array_values($data['studentBatches']));
                    const ctx = document.getElementById('studentChart');
                    if (!ctx) {
                        console.error('studentChart canvas not found');
                        return;
                    }

                    new Chart(ctx.getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: batches,
                            datasets: [{
                                label: 'Number of Students',
                                data: counts,
                                backgroundColor: 'rgba(0, 119, 225, 0.9)',
                                borderColor: 'rgba(0, 119, 225, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // Chart 2 - Program Statistics
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
                                    stacked: true, // Menambahkan ini untuk menumpuk bar
                                    beginAtZero: true
                                },
                                y: {
                                    stacked: true, // Menambahkan ini untuk menumpuk bar
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    // Chart 3 - IE Programs Doughnut
                    const programCounts = @json($programCounts);
                    const ctx3 = document.getElementById('studentChart3');
                    if (!ctx3) {
                        console.error('studentChart3 canvas not found');
                        return;
                    }

                    if (programCounts.length > 0) {
                        const chartLabels = programCounts.map(item => item.ie_program.ie_program_name);
                        const chartData = programCounts.map(item => item.count);

                        new Chart(ctx3.getContext('2d'), {
                            type: 'doughnut',
                            data: {
                                labels: chartLabels,
                                datasets: [{
                                    data: chartData,
                                    backgroundColor: [
                                        '#0077FF',
                                        '#36B9CC',
                                        '#FF6B9A',
                                        '#FFB84D'
                                    ],
                                    hoverOffset: 4
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        labels: {
                                            usePointStyle: true,
                                        }
                                    }
                                }
                            }
                        });
                    }

                    // Chart 4 - Student Statistics by Year Line Chart
                    const ctx4 = document.getElementById('studentChart4');
                    if (!ctx4) {
                        console.error('studentChart4 canvas not found');
                        return;
                    }

                    const studentCountsByYear = @json($studentCountsByYear);
                    if (studentCountsByYear && studentCountsByYear.length > 0) {
                        const yearLabels = studentCountsByYear.map(item => item.year);
                        const studentCounts = studentCountsByYear.map(item => item.student_count);

                        new Chart(ctx4.getContext('2d'), {
                            type: 'line',
                            data: {
                                labels: yearLabels,
                                datasets: [{
                                    label: 'Total Students',
                                    data: studentCounts,
                                    borderColor: '#0077FF',
                                    backgroundColor: 'rgba(0, 119, 255, 0.1)',
                                    fill: true,
                                    tension: 0.4,
                                    pointRadius: 4,
                                    pointHoverRadius: 6,
                                    pointBackgroundColor: '#0077FF',
                                    pointBorderColor: '#0077FF'
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: true,
                                        position: 'top'
                                    },
                                    tooltip: {
                                        mode: 'index',
                                        intersect: false,
                                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                        titleColor: 'white',
                                        bodyColor: 'white',
                                        borderColor: 'white',
                                        borderWidth: 1,
                                        padding: 10,
                                        callbacks: {
                                            label: function(context) {
                                                return `Students: ${context.parsed.y}`;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        grid: {
                                            color: 'rgba(0, 0, 0, 0.1)'
                                        },
                                        ticks: {
                                            stepSize: 1,
                                            color: '#666'
                                        }
                                    },
                                    x: {
                                        grid: {
                                            display: false
                                        },
                                        ticks: {
                                            color: '#666'
                                        }
                                    }
                                }
                            }
                        });
                    } else {
                        console.log('No data available for student counts by year chart');
                    }
                };
        </script>
    @endpush
    @stack('scripts')
</x-app-layout>
