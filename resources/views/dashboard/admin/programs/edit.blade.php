<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Program') }}
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

                <!-- Form to Edit Program -->
                <form method="POST" action="{{ route('admin.program.update', $program->ID_program) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- This specifies that this is an update operation -->

                    <!-- program Name -->
                    <div>
                        <x-input-label for="program_Name" :value="__('program Name')" />
                        <x-text-input id="program_Name" class="block mt-1 w-full" type="text" name="program_Name" :value="old('program_Name', $program->program_Name)" required autofocus autocomplete="program_Name" />
                        <x-input-error :messages="$errors->get('program_Name')" class="mt-2" />
                    </div>

                    <!-- Country of Execution -->
                    <div class="mt-4">
                        <x-input-label for="Country_of_Execution" :value="__('Country of Execution')" />
                        <x-text-input id="Country_of_Execution" class="block mt-1 w-full" type="text" name="Country_of_Execution" :value="old('Country_of_Execution', $program->Country_of_Execution)" maxlength="50" required autocomplete="Country_of_Execution" />
                        <x-input-error :messages="$errors->get('Country_of_Execution')" class="mt-2" />
                    </div>

                    <!-- Execution Date -->
                    <div class="mt-4">
                        <x-input-label for="Execution_Date" :value="__('Execution Date')" />
                        <x-text-input id="Execution_Date" class="block mt-1 w-full" type="date" name="Execution_Date" :value="old('Execution_Date', $program->Execution_Date)" required autocomplete="Execution_Date" />
                        <x-input-error :messages="$errors->get('Execution_Date')" class="mt-2" />
                    </div>

                    <!-- Participants Count -->
                    <div class="mt-4">
                        <x-input-label for="Participants_Count" :value="__('Participants Count')" />
                        <x-text-input id="Participants_Count" class="block mt-1 w-full" type="number" name="Participants_Count" :value="old('Participants_Count', $program->Participants_Count)" min="1" required autocomplete="Participants_Count" />
                        <x-input-error :messages="$errors->get('Participants_Count')" class="mt-2" />
                    </div>

                    <!-- IE Program Dropdown -->
                    <div class="mt-4">
                        <x-input-label for="ID_Ie_program" :value="__('IE Program')" />
                        <select id="ID_Ie_program" class="block mt-1 w-full" name="ID_Ie_program" required>
                            <option value="">Select IE Program</option>
                            @foreach($iePrograms as $ie)
                                <option value="{{ $ie->ID_Ie_program }}" {{ old('ID_Ie_program', $program->ID_Ie_program) == $ie->ID_Ie_program ? 'selected' : '' }}>
                                    {{ $ie->ie_program_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('ID_Ie_program')" class="mt-2" />
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

                    <!-- program Image -->
                    <div class="mt-4">
                        <x-input-label for="program_Image" :value="__(' program Image')" />
                        <x-text-input id="program_Image" class="block mt-1 w-full" type="file" name="program_Image" accept="image/*" autocomplete="program_Image" />
                        <x-input-error :messages="$errors->get('program_Image')" class="mt-2" />
                        @if($program->program_Image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $program->program_Image) }}" alt="Current Image" class="rounded-lg w-[150px] h-[100px] object-cover">
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Program
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
