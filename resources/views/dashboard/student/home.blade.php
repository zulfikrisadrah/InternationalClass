<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Dashboard Mahasiswa</h1>

        <!-- Menampilkan data indeks prestasi kumulatif -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-2">Indeks Prestasi Kumulatif (IPK)</h2>
            @if(isset($indeksPrestasiKumulatif))
                <p class="text-lg">IPK Anda saat ini adalah: <strong>{{ $indeksPrestasiKumulatif }}</strong></p>
            @else
                <p class="text-red-500">Data IPK tidak tersedia.</p>
            @endif

            <!-- Jika ada error -->
            @if(session('error'))
                <p class="text-red-500">{{ session('error') }}</p>
            @endif
        </div>
    </div>
</x-app-layout>
