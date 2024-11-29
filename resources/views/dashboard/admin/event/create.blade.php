<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Event') }}
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

                <form method="POST" action="{{ route('admin.event.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Event Title -->
                    <div>
                        <x-input-label for="Event_Title" :value="__('Event Title')" />
                        <x-text-input id="Event_Title" class="block mt-1 w-full" type="text" name="Event_Title" :value="old('Event_Title')" required autofocus autocomplete="Event_Title" />
                        <x-input-error :messages="$errors->get('Event_Title')" class="mt-2" />
                    </div>

                    <!-- Event Content -->
                    <div class="mt-4">
                        <x-input-label for="Event_Content" :value="__('Event Content')" />
                        <textarea id="Event_Content" name="Event_Content" class="block mt-1 w-full" rows="4" required>{{ old('Event_Content') }}</textarea>
                        <x-input-error :messages="$errors->get('Event_Content')" class="mt-2" />
                    </div>

                    <!-- Event Image -->
                    <div class="mt-4">
                        <x-input-label for="Event_Image" :value="__('Event Image')" />
                        <x-text-input id="Event_Image" class="block mt-1 w-full" type="file" name="Event_Image" accept="image/*" autocomplete="Event_Image" />
                        <x-input-error :messages="$errors->get('Event_Image')" class="mt-2" />
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
