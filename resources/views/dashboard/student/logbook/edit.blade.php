<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Edit Logbook Entry</h2>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 mb-4 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('student.logbook.update', [$program->ID_program, $logbook->ID_Logbook]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Logbook Name -->
                    <div>
                        <x-input-label for="Logbook_Name" :value="__('Activity')" />
                        <x-text-input id="Logbook_Name" class="block mt-1 w-full" type="text" name="Logbook_Name" :value="old('Logbook_Name', $logbook->Logbook_Name)" required autofocus />
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
                            :value="old('Start_Time', \Carbon\Carbon::parse($logbook->Start_Time)->format('Y-m-d\TH:i'))"
                            min="{{ \Carbon\Carbon::parse($program->Execution_Date)->format('Y-m-d\TH:i') }}"
                            max="{{ \Carbon\Carbon::parse($program->End_Date)->format('Y-m-d\TH:i') }}"
                            required
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
                            :value="old('End_Time', \Carbon\Carbon::parse($logbook->End_Time)->format('Y-m-d\TH:i'))"
                            min="{{ \Carbon\Carbon::parse($program->Execution_Date)->format('Y-m-d\TH:i') }}"
                            max="{{ \Carbon\Carbon::parse($program->End_Date)->format('Y-m-d\TH:i') }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('End_Time')" class="mt-2" />
                    </div>


                    <!-- Logbook Description -->
                    <div class="mt-4">
                        <x-input-label for="Logbook_Description" :value="__('Logbook Description')" />
                        <textarea id="Logbook_Description" name="Logbook_Description" class="block mt-1 w-full" rows="6" required>{{ old('Logbook_Description', $logbook->Logbook_Description) }}</textarea>
                        <x-input-error :messages="$errors->get('Logbook_Description')" class="mt-2" />
                    </div>

                    <!-- Logbook Image -->
                    <div class="mt-4">
                        <x-input-label for="Logbook_Image" :value="__('Logbook Image (Optional)')" />
                        <x-text-input id="Logbook_Image" class="block mt-1 w-full" type="file" name="Logbook_Image" accept="image/*" />
                        @if($logbook->Logbook_Image)
                            <img src="{{ asset('storage/' . $logbook->Logbook_Image) }}" alt="Logbook Image" class="w-24 h-24 mt-2 object-cover rounded-md">
                        @endif
                        <x-input-error :messages="$errors->get('Logbook_Image')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="btn btn-primary">
                            Update Logbook Entry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
