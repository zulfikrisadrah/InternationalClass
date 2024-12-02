<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.user.store') }}">
                    @csrf

                    <!-- Name Input -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Username Input -->
                    <div class="mb-4">
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Email Input -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="ID_Study_Program" :value="__('Program Studi')" />
                        <select name="ID_Study_Program" id="ID_Study_Program" class="block mt-1 w-full" required>
                            <option value="" disabled selected>-- Pilih Program Studi --</option>
                            @foreach ($studyPrograms as $program)
                                <option value="{{ $program->ID_study_program }}" {{ old('ID_Study_Program') == $program->ID_study_program ? 'selected' : '' }}>
                                    {{ $program->study_program_Name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('ID_Study_Program')" class="mt-2" />
                    </div>                                    

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Create Staff
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
