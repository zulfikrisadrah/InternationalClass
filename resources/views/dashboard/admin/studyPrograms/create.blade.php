<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-black leading-tight">
            Add Study Program
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.studyProgram.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="study_program_Name" :value="__('Program Name')" />
                        <x-text-input id="study_program_Name" class="block mt-1 w-full" type="text"
                            name="study_program_Name" :value="old('study_program_Name')" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="degree" :value="__('Degree')" />
                        <x-text-input id="degree" class="block mt-1 w-full" type="text" name="degree"
                            :value="old('degree')" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="study_program_Description" :value="__('Program Description')" />
                        <textarea id="study_program_Description" name="study_program_Description" class="block mt-1 w-full" rows="4">{{ old('study_program_Description') }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ID_Faculty" :value="__('Faculty')" />
                        <select id="ID_Faculty" class="block mt-1 w-full text-black" name="ID_Faculty" required>
                            <option value="">Select Faculty</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->ID_Faculty }}"
                                    {{ old('ID_Faculty') == $faculty->ID_Faculty ? 'selected' : '' }}>
                                    {{ $faculty->Faculty_Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="approval_sk" :value="__('Approval SK')" />
                        <x-text-input id="approval_sk" class="block mt-1 w-full" type="text" name="approval_sk"
                            :value="old('approval_sk')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="opening_year" :value="__('Opening Year')" />
                        <x-text-input id="opening_year" class="block mt-1 w-full" type="number" name="opening_year"
                            :value="old('opening_year')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="manager_name" :value="__('Manager Name')" />
                        <x-text-input id="manager_name" class="block mt-1 w-full" type="text" name="manager_name"
                            :value="old('manager_name')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="manager_contact" :value="__('Manager Contact')" />
                        <x-text-input id="manager_contact" class="block mt-1 w-full" type="text"
                            name="manager_contact" :value="old('manager_contact')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="classrooms" :value="__('Classrooms')" />
                        <x-text-input id="classrooms" class="block mt-1 w-full" type="number" name="classrooms"
                            :value="old('classrooms')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="lecturers" :value="__('Lecturers')" />
                        <x-text-input id="lecturers" class="block mt-1 w-full" type="number" name="lecturers"
                            :value="old('lecturers')" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="national_accreditation" :value="__('National Accreditation')" />
                        <x-text-input id="national_accreditation" class="block mt-1 w-full" type="text"
                            name="national_accreditation" :value="old('national_accreditation')" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="international_accreditation" :value="__('International Accreditation')" />
                        <x-text-input id="international_accreditation" class="block mt-1 w-full" type="text"
                            name="international_accreditation" :value="old('international_accreditation')" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="ukt_fee" :value="__('UKT Fee')" />
                        <x-text-input id="ukt_fee" class="block mt-1 w-full" type="number" name="ukt_fee"
                            :value="old('ukt_fee')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ipi_fee" :value="__('IPI Fee')" />
                        <x-text-input id="ipi_fee" class="block mt-1 w-full" type="number" name="ipi_fee"
                            :value="old('ipi_fee')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="international_exposure" :value="__('International Exposure')" />
                        <x-text-input id="international_exposure" class="block mt-1 w-full" type="text"
                            name="international_exposure" :value="old('international_exposure')" />
                    </div>

                    <div x-data="{ preview: null }" class="mt-4">
                        <x-input-label for="study_program_Image" :value="__('Image')" />
                        <input type="file" id="study_program_Image" name="study_program_Image" required class="block mt-1 w-full"
                            accept="image/*" @change="preview = URL.createObjectURL($event.target.files[0])">

                        <div x-show="preview" class="mt-4">
                            <p class="text-gray-600">Preview Image:</p>
                            <img :src="preview" alt="Image Preview" class="object-contain rounded-lg border"
                                style="max-width: 100%; height: auto; max-height: 200px;">
                        </div>
                    </div>

                    <h3 class="text-xl font-bold mt-8 mb-4">Curriculum Details</h3>

                    <div class="mt-4">
                        <x-input-label for="total_courses" :value="__('Total Courses')" />
                        <x-text-input id="total_courses" class="block mt-1 w-full" type="number" name="total_courses" :value="old('total_courses')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="rps_courses_in_english" :value="__('RPS Courses in English')" />
                        <x-text-input id="rps_courses_in_english" class="block mt-1 w-full" type="number" name="rps_courses_in_english" :value="old('rps_courses_in_english')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="teaching_materials_in_english" :value="__('Teaching Materials in English')" />
                        <x-text-input id="teaching_materials_in_english" class="block mt-1 w-full" type="number" name="teaching_materials_in_english" :value="old('teaching_materials_in_english')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="courses_delivered_in_english" :value="__('Courses Delivered in English')" />
                        <x-text-input id="courses_delivered_in_english" class="block mt-1 w-full" type="number" name="courses_delivered_in_english" :value="old('courses_delivered_in_english')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="courses_fully_filled_in_sikola" :value="__('Courses Fully Filled in SIKOLA 2.0')" />
                        <x-text-input id="courses_fully_filled_in_sikola" class="block mt-1 w-full" type="number" name="courses_fully_filled_in_sikola" :value="old('courses_fully_filled_in_sikola')" />
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Add Study Program</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
