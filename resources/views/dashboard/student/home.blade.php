<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto p-4">
        <!-- Welcome Section -->
        <div class="flex flex-col pt-3 rounded-none" role="region" aria-label="Welcome Section">
            <div class="pl-10 bg-blueThird rounded-2xl max-md:pl-5 max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col">
                    <!-- Left Text Section -->
                    <div class="flex flex-col w-3/5 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col self-stretch my-auto text-white max-md:mt-10 max-md:max-w-full">
                            <h1 class="text-4xl font-bold tracking-tighter max-md:max-w-full">
                                Welcome back, {{ ucwords(strtolower($namaMahasiswa)) }}


                            </h1>
                        </div>
                    </div>
                    <!-- Right Image Section -->
                    <div class="flex flex-col ml-5 w-2/5 max-md:ml-0 max-md:w-full">
                        <img loading="lazy"
                            src="{{ asset('images/homestudent.png') }}"
                            alt="Welcome section decorative illustration"
                            class="object-contain z-10 grow -mt-3 w-full aspect-[1.95] max-md:mt-10 max-md:mr-0" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Mahasiswa & IPK -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <!-- Informasi Mahasiswa -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800 border-b pb-3">Informasi Mahasiswa</h2>
                <div class="grid grid-cols-3 gap-4">
                    <p class="text-lg font-semibold">Nama Mahasiswa</p>
                    <p class="text-lg col-span-2">: {{ auth()->user()->name }}</p>

                    <p class="text-lg font-semibold">NIM</p>
                    <p class="text-lg col-span-2">: {{ $nim }}</p>

                    <p class="text-lg font-semibold">Email</p>
                    <p class="text-lg col-span-2">: {{ auth()->user()->email }}</p>

                    <p class="text-lg font-semibold">Program Studi</p>
                    <p class="text-lg col-span-2">: {{ $namaProdi }}</p>
                </div>
            </div>

            <!-- Indeks Prestasi Mahasiswa -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800 border-b pb-3">Indeks Prestasi
                    Mahasiswa</h2>
                @if (isset($indeksPrestasiKumulatif))
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-lg font-semibold">IPK</p>
                        <p class="text-lg col-span-2">: {{ $indeksPrestasiKumulatif }}</p>

                        <p class="text-lg font-semibold">SKS Dilulusi</p>
                        <p class="text-lg col-span-2">: {{ $sks_dilulusi ?? 'Tidak Tersedia' }}</p>
                    </div>
                @else
                    <p class="text-red-500">Data IPK tidak tersedia.</p>
                @endif
            </div>
        </div>

        <!-- Masa Studi Mahasiswa -->
        <div class="flex justify-center mt-6">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-2/3 lg:w-1/2">
                <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800 border-b pb-3">Masa Studi Mahasiswa
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col items-center">
                        <p class="text-lg font-semibold">Masa Studi Maksimal</p>
                        <p class="text-lg text-blueSecondary">{{ $masa_studi_maksimal }}</p>
                    </div>

                    <div class="flex flex-col items-center">
                        <p class="text-lg font-semibold">Sisa Masa Studi</p>
                        <p class="text-lg text-blueSecondary">{{ $sisa_masa_studi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
