<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New News') }}
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

                <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Event Title -->
                    <div>
                        <x-input-label for="News_Title" :value="__('News Title')" />
                        <x-text-input id="News_Title" class="block mt-1 w-full" type="text" name="News_Title" :value="old('News_Title')" required autofocus autocomplete="News_Title" />
                        <x-input-error :messages="$errors->get('News_Title')" class="mt-2" />
                    </div>

                    <!-- Event Content -->
                    <div class="mt-4">
                        <x-input-label for="News_Content" :value="__('News Content')" />
                        <textarea id="News_Content" name="News_Content" class="block mt-1 w-full" rows="4" required>{{ old('News_Content') }}</textarea>
                        <x-input-error :messages="$errors->get('News_Content')" class="mt-2" />
                    </div>

                    <!-- Event Image -->
                    <div class="mt-4">
                        <x-input-label for="News_Image" :value="__('News Image')" />
                        <x-text-input id="News_Image" class="block mt-1 w-full" type="file" name="News_Image" accept="image/*" autocomplete="News_Image" />
                        <x-input-error :messages="$errors->get('News_Image')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New News
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
