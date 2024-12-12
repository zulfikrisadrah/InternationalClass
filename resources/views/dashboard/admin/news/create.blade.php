<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('New News') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="w-auto mx-auto sm:px-6 lg:px-8"> <!-- Memperlebar container -->
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- News Title -->
                    <div>
                        <x-input-label for="News_Title" :value="__('News Title')" />
                        <x-text-input id="News_Title" class="block mt-1 w-full" type="text" name="News_Title"
                            :value="old('News_Title')" required minlength="16" autofocus autocomplete="News_Title" />
                        <x-input-error :messages="$errors->get('News_Title')" class="mt-2" />
                    </div>

                    <!-- News Content -->
                    <div class="mt-4">
                        <x-tinymce-config />
                        <x-input-label for="News_Content" :value="__('News Content')" />
                        <textarea id="News_Content" name="News_Content" class="block mt-1 w-full"
                            rows="6">{{ old('News_Content') }}</textarea> <!-- Memperlebar textarea -->
                        <x-input-error :messages="$errors->get('News_Content')" class="mt-2" />
                    </div>

                    @role('admin')
                        <div class="mt-4">
                            <x-input-label for="ID_study_program" :value="__('Study Program')" />
                            <select id="ID_study_program" class="block mt-1 w-full" name="ID_study_program" required>
                                <option value="">Select Study Program</option>
                                @foreach($studyPrograms as $studyProgram)
                                    <option value="{{ $studyProgram->ID_study_program }}" {{ old('ID_study_program') == $studyProgram->ID_study_program ? 'selected' : '' }}>
                                        {{ $studyProgram->study_program_Name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('ID_study_program')" class="mt-2" />
                        </div>
                    @endrole

                    <!-- News Image -->
                    <div x-data="{ preview: null }" class="mt-4">
                        <x-input-label for="News_Image" :value="__('News Image')" />
                        <input type="file" id="News_Image" name="News_Image" required class="block mt-1 w-full" accept="image/*"
                            @change="preview = URL.createObjectURL($event.target.files[0])">

                        <!-- Image Preview -->
                        <div x-show="preview" class="mt-4">
                            <p class="text-gray-600">Preview Image:</p>
                            <img :src="preview" alt="Image Preview" class="object-contain rounded-lg border"
                                style="max-width: 100%; height: auto; max-height: 200px;">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-blueThird text-white rounded-full">
                            Add New News
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
