<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            Edit Study Program & Curriculum
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('admin.studyProgram.update', $studyProgram->ID_study_program) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3 class="text-xl font-bold mb-4">Study Program Details</h3>

                    <div>
                        <x-input-label for="study_program_Name" :value="__('Program Name')" />
                        <input id="study_program_Name" type="text" class="block mt-1 w-full" name="study_program_Name" value="{{ old('study_program_Name', $studyProgram->study_program_Name) }}" required />
                        <ul id="autocomplete-results" class="dropdown-menu hidden absolute bg-white border border-gray-300 max-h-60 overflow-y-auto z-10"></ul>
                    </div>

                    <script>
                        document.getElementById('study_program_Name').addEventListener('input', async function () {
                            const query = this.value;
                            const results = document.getElementById('autocomplete-results');

                            if (query.length >= 2) {
                                const response = await fetch('/autocomplete-study-programs?query=' + query, {
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    }
                                });

                                const programs = await response.json();
                                console.log(programs);

                                results.innerHTML = '';

                                if (programs.length > 0) {
                                    results.classList.remove('hidden');
                                    programs.forEach(program => {
                                        const listItem = document.createElement('li');
                                        listItem.textContent = program.prodiNama;
                                        listItem.className = 'p-2 cursor-pointer hover:bg-gray-100';

                                        listItem.addEventListener('click', () => {
                                            document.getElementById('study_program_Name').value = program.prodiNama;
                                            results.innerHTML = '';
                                            results.classList.add('hidden');
                                        });

                                        results.appendChild(listItem);
                                    });
                                } else {
                                    results.classList.add('hidden');
                                }
                            } else {
                                results.classList.add('hidden');
                            }
                        });
                    </script>

                    <div class="mt-4">
                        <x-input-label for="degree" :value="__('Degree')" />
                        <x-text-input id="degree" class="block mt-1 w-full" type="text" name="degree" :value="old('degree', $studyProgram->degree)" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="study_program_Description" :value="__('Program Description')" />
                        <textarea id="study_program_Description" name="study_program_Description" class="block mt-1 w-full" rows="4">{{ old('study_program_Description', $studyProgram->study_program_Description) }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ID_Faculty" :value="__('Faculty')" />
                        <select id="ID_Faculty" class="block mt-1 w-full" name="ID_Faculty" required>
                            <option value="">Select Faculty</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->ID_Faculty }}" {{ old('ID_Faculty', $studyProgram->ID_Faculty) == $faculty->ID_Faculty ? 'selected' : '' }}>
                                    {{ $faculty->Faculty_Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="approval_sk" :value="__('Approval SK')" />
                        <x-text-input id="approval_sk" class="block mt-1 w-full" type="text" name="approval_sk" :value="old('approval_sk', $studyProgram->approval_sk)" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="opening_year" :value="__('Opening Year')" />
                        <x-text-input id="opening_year" class="block mt-1 w-full" type="number" name="opening_year" :value="old('opening_year', $studyProgram->opening_year)" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="director_name" :value="__('Director Name')" />
                        <x-text-input id="director_name" class="block mt-1 w-full" type="text" name="director_name" :value="old('director_name', $studyProgram->director_name)" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="director_contact" :value="__('Director Contact')" />
                        <x-text-input id="director_contact" class="block mt-1 w-full" type="text" name="director_contact" :value="old('director_contact', $studyProgram->director_contact)" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="classrooms" :value="__('Classrooms')" />
                        <x-text-input id="classrooms" class="block mt-1 w-full" type="number" name="classrooms" :value="old('classrooms', $studyProgram->classrooms)" required/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="lecturers" :value="__('Lecturers')" />
                        <x-text-input id="lecturers" class="block mt-1 w-full" type="number" name="lecturers" :value="old('lecturers', $studyProgram->lecturers)" required/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="national_accreditation" :value="__('National Accreditation')" />
                        <x-text-input id="national_accreditation" class="block mt-1 w-full" type="text" name="national_accreditation" :value="old('lecturers', $studyProgram->national_accreditation)" required/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="international_accreditation" :value="__('International Accreditation')" />
                        <x-text-input id="international_accreditation" class="block mt-1 w-full" type="text" name="international_accreditation" :value="old('lecturers', $studyProgram->international_accreditation)" required/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="ukt_fee" :value="__('UKT Fee')" />
                        <x-text-input id="ukt_fee" class="block mt-1 w-full" type="number" name="ukt_fee" :value="old('ukt_fee', $studyProgram->ukt_fee)" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ipi_fee" :value="__('IPI Fee')" />
                        <x-text-input id="ipi_fee" class="block mt-1 w-full" type="number" name="ipi_fee" :value="old('ipi_fee', $studyProgram->ipi_fee)" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="international_exposure" :value="__('International Exposure')" />
                        <x-text-input id="international_exposure" class="block mt-1 w-full" type="text" name="international_exposure" :value="old('international_exposure', $studyProgram->international_exposure)" />
                    </div>

                    <div x-data="{ preview: '{{ asset('storage/' . $studyProgram->study_program_Image) }}' }" class="mt-4">
                        <x-input-label for="study_program_Image" :value="__('Image')" />
                        <input type="file" id="study_program_Image" name="study_program_Image" class="block mt-1 w-full"
                            accept="image/*" @change="preview = URL.createObjectURL($event.target.files[0])">

                        <div x-show="preview" class="mt-4">
                            <img :src="preview" alt="Image Preview" class="w-32 h-32 object-cover rounded-lg">
                        </div>
                    </div>

                    <h3 class="text-xl font-bold mt-8 mb-4">Curriculum Details</h3>

                    <div class="mt-4">
                        <x-input-label for="total_courses" :value="__('Total Courses')" />
                        <x-text-input id="total_courses" class="block mt-1 w-full" type="number" name="total_courses" :value="old('lecturers', $studyProgram->total_courses)" required/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="rps_courses_in_english" :value="__('RPS Courses in English')" />
                        <x-text-input id="rps_courses_in_english" class="block mt-1 w-full" type="number" name="rps_courses_in_english" :value="old('lecturers', $studyProgram->rps_courses_in_english)" required/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="teaching_materials_in_english" :value="__('Teaching Materials in English')" />
                        <x-text-input id="teaching_materials_in_english" class="block mt-1 w-full" type="number" name="teaching_materials_in_english" :value="old('lecturers', $studyProgram->teaching_materials_in_english)" required/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="courses_delivered_in_english" :value="__('Courses Delivered in English')" />
                        <x-text-input id="courses_delivered_in_english" class="block mt-1 w-full" type="number" name="courses_delivered_in_english" :value="old('lecturers', $studyProgram->courses_delivered_in_english)" required/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="courses_fully_filled_in_sikola" :value="__('Courses Fully Filled in SIKOLA 2.0')" />
                        <x-text-input id="courses_fully_filled_in_sikola" class="block mt-1 w-full" type="number" name="courses_fully_filled_in_sikola" :value="old('lecturers', $studyProgram->courses_fully_filled_in_sikola)" required/>
                    </div>


                    <div class="mt-8">
                        <button type="submit" class="btn btn-primary">Update Study Program & Curriculum</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
