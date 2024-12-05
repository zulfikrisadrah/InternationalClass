<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>
    <section class="flex flex-col rounded-none px-6 py-6">
        <div class="w-full">
            <div class="flex gap-5 max-md:flex-col">
                <!-- Left Chart Section -->
                <div class="flex flex-col w-full md:w-[36%] max-md:w-full">
                    <article class="flex flex-col py-6 px-6 w-full h-full bg-white rounded-md shadow-2xl text-black">
                        <header class="flex flex-col px-4 w-full">
                            <h2 class="self-start text-lg font-medium leading-loose">Student Statistic By Years</h2>
                        </header>
                        <!-- Canvas untuk Chart.js -->
                        <div class="flex justify-center w-full mt-4">
                            <canvas id="studentChart" class="w-full h-[260px] max-h-[260px]"></canvas>
                        </div>
                    </article>
                </div>

                <!-- Right Chart Section (Center Alignment) -->
                <div class="flex flex-col w-full md:w-[66%] max-md:w-full mx-auto">
                    <article class="flex flex-col py-6 mx-auto w-full bg-white rounded-md shadow-2xl">
                        <header class="flex flex-col px-8 w-full text-slate-700">
                            <h2 class="self-start text-lg font-medium leading-loose">Student Statistic</h2>
                        </header>
                        <div class="self-center mt-1.5 w-full">
                            <div class="flex gap-5 flex-wrap">
                                <!-- Grafik kedua -->
                                <div class="flex flex-col w-full md:w-[83%] mx-auto">
                                    <div class="flex flex-col w-full">
                                        <div class="flex justify-between items-center w-full">
                                            <div class="flex flex-col w-full h-[300px] max-h-[400px]">
                                                <canvas id="studentChart2" class="w-full h-full"></canvas> <!-- Menentukan tinggi canvas -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.onload = function() {
            // Ambil konteks canvas untuk Chart.js
            var ctx = document.getElementById('studentChart').getContext('2d');

            // Inisialisasi chart pertama
            var studentChart = new Chart(ctx, {
                type: 'bar', // Jenis chart (bar chart)
                data: {
                    labels: ['2020', '2021', '2022', '2023'], // Label untuk sumbu X
                    datasets: [{
                        label: 'Number of Students', // Label dataset
                        data: [120, 150, 180, 130], // Data untuk bar chart
                        backgroundColor: 'rgba(0, 119, 225, 90)', // Warna latar belakang bar
                        borderColor: 'rgba(0, 119, 225, 100)', // Warna border bar
                        borderWidth: 1 // Ketebalan border
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
                            beginAtZero: true // Agar grafik mulai dari 0
                        }
                    }
                }
            });

            // Ambil konteks canvas untuk Chart.js kedua
            var ctx2 = document.getElementById('studentChart2').getContext('2d');
            var studentChart2 = new Chart(ctx2, {
                type: 'bar', // Jenis chart (bar chart)
                data: {
                    labels: ['Manajemen', 'Akuntansi', 'Ilmu Hukum', 'Pendidikan Dokter', 'Teknik Sipil',
                        'T. Informatika', 'Arsitektur', 'T. Geologi', 'Ilmu Hubungan International',
                        'Ilmu Komunikasi', 'Pend. Dokter Gigi', 'Kesehatan Masyarakat', 'Ilmu Keperawatan'
                    ],
                    datasets: [{
                        label: '2022',
                        data: [130, 160, 190, 150, 170, 160, 180, 175, 145, 160, 155, 150, 125],
                        backgroundColor: 'rgba(75, 192, 192, 100)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: '2023',
                        data: [140, 170, 200, 160, 180, 170, 190, 185, 155, 170, 165, 160, 135],
                        backgroundColor: 'rgba(153, 102, 255, 100)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
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
        };
    </script>
</x-app-layout>
