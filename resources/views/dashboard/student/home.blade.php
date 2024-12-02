<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800 border-b pb-3">Informasi Mahasiswa</h2>
                <div class="grid grid-cols-3 gap-4">
                    <p class="text-lg font-semibold">Nama Mahasiswa</p>
                    <p class="text-lg col-span-2">:  {{ $namaMahasiswa }}</p>

                    <p class="text-lg font-semibold">NIM</p>
                    <p class="text-lg col-span-2">:  {{ $nim }}</p>

                    <p class="text-lg font-semibold">Email</p>
                    <p class="text-lg col-span-2">:  {{ $email }}</p>

                    <p class="text-lg font-semibold">Program Studi</p>
                    <p class="text-lg col-span-2">:  {{ $namaProdi }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800 border-b pb-3">Indeks Prestasi Mahasiswa</h2>
                @if(isset($indeksPrestasiKumulatif))
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-lg font-semibold">IPK</p>
                        <p class="text-lg col-span-2">:  {{ $indeksPrestasiKumulatif }}</p>

                        <p class="text-lg font-semibold">SKS Dilulusi</p>
                        <p class="text-lg col-span-2">: {{ $sks_dilulusi ?? 'Tidak Tersedia' }}</p>                        
                    </div>
                @else
                    <p class="text-red-500">Data IPK tidak tersedia.</p>
                @endif
            </div>
        </div>

        <div class="flex justify-center mt-6">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full sm:w-2/3 lg:w-1/2">
                <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800 border-b pb-3">Masa Studi Mahasiswa</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col items-center">
                        <p class="text-lg font-semibold">Masa Studi Maksimal</p>
                        <p class="text-lg text-gray-900">{{ $masa_studi_maksimal }}</p>
                    </div>
                
                    <div class="flex flex-col items-center">
                        <p class="text-lg font-semibold">Sisa Masa Studi</p>
                        <p class="text-lg text-gray-900">{{ $sisa_masa_studi }}</p>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</x-app-layout>
