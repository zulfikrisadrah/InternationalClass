<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <form id="profileForm" method="POST" action="{{ route('profile.update') }}" class="space-y-8">
                        @csrf
                        @method('POST')

                        <!-- Profile Header -->
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-2xl font-semibold text-gray-900">{{ __('Edit Profile') }}</h3>
                        </div>

                        <!-- Form Fields -->
                        <div class="space-y-6">
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="space-y-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        {{ __('Name') }}
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        {{ __('Email') }}
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email', $user->email) }}"
                                        required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label for="username" class="block text-sm font-medium text-gray-700">
                                        {{ __('NIM') }}
                                    </label>
                                    <input
                                        type="text"
                                        id="username"
                                        name="username"
                                        value="{{ $user->username }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm sm:text-sm"
                                    />
                                </div>
                            </div>

                            <!-- Identity Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="nik" class="block text-sm font-medium text-gray-700">
                                        {{ __('NIK') }}
                                    </label>
                                    <input
                                        type="text"
                                        id="nik"
                                        name="nik"
                                        value="{{ old('nik', $nik) }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label for="nisn" class="block text-sm font-medium text-gray-700">
                                        {{ __('NISN') }}
                                    </label>
                                    <input
                                        type="text"
                                        id="nisn"
                                        name="nisn"
                                        value="{{ old('nisn', $nisn) }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50"
                                    />
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="handphone" class="block text-sm font-medium text-gray-700">
                                        {{ __('Mobile Phone') }}
                                    </label>
                                    <input
                                        type="tel"
                                        id="handphone"
                                        name="handphone"
                                        value="{{ old('handphone', $handphone) }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label for="telepon" class="block text-sm font-medium text-gray-700">
                                        {{ __('Home Phone') }}
                                    </label>
                                    <input
                                        type="tel"
                                        id="telepon"
                                        name="telepon"
                                        value="{{ old('telepon', $telepon) }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50"
                                    />
                                </div>
                            </div>

                            <!-- Address Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="jalan" class="block text-sm font-medium text-gray-700">
                                        {{ __('Street Address') }}
                                    </label>
                                    <input
                                        type="text"
                                        id="jalan"
                                        name="jalan"
                                        value="{{ old('jalan', $jalan) }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label for="kode_pos" class="block text-sm font-medium text-gray-700">
                                        {{ __('Postal Code') }}
                                    </label>
                                    <input
                                        type="text"
                                        id="kode_pos"
                                        name="kode_pos"
                                        value="{{ old('kode_pos', $kode_pos) }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50"
                                    />
                                </div>
                            </div>

                            <!-- Birth Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">
                                        {{ __('Place of Birth') }}
                                    </label>
                                    <input
                                        type="text"
                                        id="tempat_lahir"
                                        name="tempat_lahir"
                                        value="{{ old('tempat_lahir', $tempat_lahir) }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">
                                        {{ __('Date of Birth') }}
                                    </label>
                                    <input
                                        type="date"
                                        id="tanggal_lahir"
                                        name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', $tanggal_lahir) }}"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-50"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end pt-6">
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            >
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
