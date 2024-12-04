<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <!-- Form to Edit User -->
                <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                    @csrf
                    @method('PUT') <!-- This specifies that this is an update operation -->

                    <!-- Name Input -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Input -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Status Active Input (Checkbox) -->
                    <div class="mb-4">
                        <x-input-label for="isActive" :value="__('Active Status')" />

                        <!-- Using HTML checkbox -->
                        <input type="checkbox" id="isActive" name="isActive"
                            value="1"
                            {{ old('isActive', $user->student->isActive ?? 0) == 1 ? 'checked' : '' }}
                            class="form-checkbox" />

                        <x-input-error :messages="$errors->get('isActive')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-blueThird text-white rounded-full">
                            Update User
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
