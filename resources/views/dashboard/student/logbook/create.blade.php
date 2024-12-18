<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                <h2 class="text-2xl font-bold mb-4">New Logbook Entry</h2>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('student.logbook.store', $program->ID_program) }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Fields -->
                    <!-- Logbook Name -->
                    <div>
                        <x-input-label for="Logbook_Name" :value="__('Activity')" />
                        <x-text-input id="Logbook_Name" class="block mt-1 w-full" type="text" name="Logbook_Name" :value="old('Logbook_Name')" required autofocus autocomplete="Logbook_Name" />
                        <x-input-error :messages="$errors->get('Logbook_Name')" class="mt-2" />
                    </div>

                    <!-- Start Time -->
                    <div class="mt-4">
                        <x-input-label for="Start_Time" :value="__('Start Time')" />
                        <x-text-input
                            id="Start_Time"
                            class="block mt-1 w-full"
                            type="datetime-local"
                            name="Start_Time"
                            :value="old('Start_Time')"
                            min="{{ \Carbon\Carbon::parse($program->Execution_Date)->format('Y-m-d\TH:i') }}"
                            max="{{ \Carbon\Carbon::parse($program->End_Date)->format('Y-m-d\TH:i') }}"
                            required
                            autocomplete="Start_Time"
                        />
                        <x-input-error :messages="$errors->get('Start_Time')" class="mt-2" />
                    </div>

                    <!-- End Time -->
                    <div class="mt-4">
                        <x-input-label for="End_Time" :value="__('End Time')" />
                        <x-text-input
                            id="End_Time"
                            class="block mt-1 w-full"
                            type="datetime-local"
                            name="End_Time"
                            :value="old('End_Time')"
                            min="{{ \Carbon\Carbon::parse($program->Execution_Date)->format('Y-m-d\TH:i') }}"
                            max="{{ \Carbon\Carbon::parse($program->End_Date)->format('Y-m-d\TH:i') }}"
                            required
                            autocomplete="End_Time"
                        />
                        <x-input-error :messages="$errors->get('End_Time')" class="mt-2" />
                    </div>

                    <!-- Logbook Description -->
                    <div class="mt-4">
                        <x-tinymce-config />
                        <x-input-label for="Logbook_Description" :value="__('Logbook Description')" />
                        <textarea id="Logbook_Description" name="Logbook_Description" class="block mt-1 w-full" rows="6" required>{{ old('Logbook_Description') }}</textarea>
                        <x-input-error :messages="$errors->get('Logbook_Description')" class="mt-2" />
                    </div>

                    <!-- Logbook Image -->
                    <div class="mt-4">
                        <x-input-label for="Logbook_Image" :value="__('Logbook Image')" />
                        <x-text-input id="Logbook_Image" class="block mt-1 w-full" type="file" name="Logbook_Image" accept="image/*" />
                        <x-input-error :messages="$errors->get('Logbook_Image')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Logbook Entry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
