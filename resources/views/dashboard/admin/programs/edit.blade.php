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
                <form method="POST" action="{{ route('admin.program.update', $program->ID_Activity) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- This specifies that this is an update operation -->

                    <!-- Activity Name -->
                    <div>
                        <x-input-label for="Activity_Name" :value="__('Activity Name')" />
                        <x-text-input id="Activity_Name" class="block mt-1 w-full" type="text" name="Activity_Name" :value="old('Activity_Name', $program->Activity_Name)" required autofocus autocomplete="Activity_Name" />
                        <x-input-error :messages="$errors->get('Activity_Name')" class="mt-2" />
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

                    <!-- IeActivity Image -->
                    <div class="mt-4">
                        <x-input-label for="IeActivity_Image" :value="__('IE Activity Image')" />
                        <x-text-input id="IeActivity_Image" class="block mt-1 w-full" type="file" name="IeActivity_Image" accept="image/*" autocomplete="IeActivity_Image" />
                        <x-input-error :messages="$errors->get('IeActivity_Image')" class="mt-2" />
                        @if($program->IeActivity_Image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $program->IeActivity_Image) }}" alt="Current Image" class="rounded-lg w-[150px] h-[100px] object-cover">
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
