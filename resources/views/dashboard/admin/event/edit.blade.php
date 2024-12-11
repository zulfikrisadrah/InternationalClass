<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-6 sm:p-8 md:p-10 shadow-sm sm:rounded-lg">

                <!-- Form to Edit Event -->
                <form method="POST" action="{{ route('admin.event.update', $event->ID_Event) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- This specifies that this is an update operation -->

                    <!-- Event Title -->
                    <div>
                        <x-input-label for="Event_Title" :value="__('Event Title')" />
                        <x-text-input id="Event_Title" class="block mt-1 w-full" type="text" name="Event_Title"
                            :value="old('Event_Title', $event->Event_Title)" required minlength="16" autofocus autocomplete="Event_Title" />
                        <x-input-error :messages="$errors->get('Event_Title')" class="mt-2" />
                    </div>

                    <!-- Event Content -->
                    <div class="mt-4">
                        <x-tinymce-config />
                        <x-input-label for="Event_Content" :value="__('Event Content')" />
                        <textarea id="Event_Content" name="Event_Content" class="block mt-1 w-full h-40 sm:h-48 md:h-60 lg:h-72 resize-none"
                            required>{{ old('Event_Content', $event->Event_Content) }}</textarea>
                        <x-input-error :messages="$errors->get('Event_Content')" class="mt-2" />
                    </div>

                    <!-- Event Date -->
                    <div class="mt-4">
                        <x-input-label for="Event_Date" :value="__('Event Date')" />
                        <x-text-input id="Event_Date" class="block mt-1 w-full" type="date" name="Event_Date"
                            :value="old('Event_Date', $event->Event_Date ? $event->Event_Date->format('Y-m-d') : '')" required />
                        <x-input-error :messages="$errors->get('Event_Date')" class="mt-2" />
                    </div>

                    @role('admin')
                        <div class="mt-4">
                            <x-input-label for="ID_study_program" :value="__('Study Program')" />
                            <select id="ID_study_program" class="block mt-1 w-full" name="ID_study_program" required>
                                <option value="">Select study Program</option>
                                @foreach($studyPrograms as $studyProgram)
                                    <option value="{{ $studyProgram->ID_study_program }}" {{ old('ID_study_program', $studyProgram->ID_study_program) == $studyProgram->ID_study_program ? 'selected' : '' }}>
                                        {{ $studyProgram->study_program_Name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('ID_study_program')" class="mt-2" />
                        </div>
                    @endrole

                    <!-- Event Image -->
                    <div x-data="{ preview: '{{ asset('storage/' . $event->Event_Image) }}' }" class="mt-4">
                        <x-input-label for="Event_Image" :value="__('Event Image')" />
                        <input type="file" id="Event_Image" name="Event_Image" class="block mt-1 w-full"
                            accept="image/*" @change="preview = URL.createObjectURL($event.target.files[0])">

                        <!-- Image Preview -->
                        <div x-show="preview" class="mt-4">
                            <p class="text-gray-600">Preview Image:</p>
                            <img :src="preview" alt="Image Preview"
                                class="object-contain rounded-lg border w-full max-w-full"
                                style="max-height: 300px; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="font-bold py-3 px-6 bg-blueThird text-white rounded-full">
                            Update Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
