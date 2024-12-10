<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.calender.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Agenda Title -->
                    <div>
                        <x-input-label for="agenda_title" :value="__('Event Title')" />
                        <x-text-input id="agenda_title" class="block mt-1 w-full" type="text" name="agenda_title" :value="old('agenda_title')" required autofocus />
                        <x-input-error :messages="$errors->get('agenda_title')" class="mt-2" />
                    </div>

                    <!-- Start Date & Time -->
                    <div class="mt-4">
                        <x-input-label for="agenda_start" :value="__('Start Date & Time')" />
                        <x-text-input id="agenda_start" class="block mt-1 w-full" type="datetime-local" name="agenda_start" :value="old('agenda_start')" required />
                        <x-input-error :messages="$errors->get('agenda_start')" class="mt-2" />
                    </div>

                    <!-- End Date & Time -->
                    <div class="mt-4">
                        <x-input-label for="agenda_end" :value="__('End Date & Time')" />
                        <x-text-input id="agenda_end" class="block mt-1 w-full" type="datetime-local" name="agenda_end" :value="old('agenda_end')" required />
                        <x-input-error :messages="$errors->get('agenda_end')" class="mt-2" />
                    </div>

                    <!-- Location -->
                    <div class="mt-4">
                        <x-input-label for="agenda_location" :value="__('Location')" />
                        <x-text-input id="agenda_location" class="block mt-1 w-full" type="text" name="agenda_location" :value="old('agenda_location')" required />
                        <x-input-error :messages="$errors->get('agenda_location')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <x-input-label for="agenda_description" :value="__('Description')" />
                        <textarea id="agenda_description" class="block mt-1 w-full" name="agenda_description" rows="4" required>{{ old('agenda_description') }}</textarea>
                        <x-input-error :messages="$errors->get('agenda_description')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
