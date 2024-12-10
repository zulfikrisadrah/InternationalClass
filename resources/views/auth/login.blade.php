<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="flex flex-col items-center px-20 pt-12 pb-24 rounded-3xl border-t-2 border-l-2 bg-white bg-opacity-60 border-bluePrimary max-w-[684px] shadow-[2px_2px_6px_rgba(132,132,132,1)] max-md:px-5 max-md:pb-24">
        <div class="flex flex-col w-full max-w-[476px] max-md:max-w-full">
            <img loading="lazy" src="{{ asset('images/logoUnhas.png') }}" alt="Hasanuddin University logo" class="object-contain self-center ml-3 aspect-square w-[70px]" />
            <header class="flex flex-col px-3 mt-5 text-stone-900 max-md:max-w-full">
                <h1 class="ml-4 text-2xl font-semibold max-md:max-w-full">
                    Welcome to Hasanuddin University
                </h1>
            </header>

            <form method="POST" action="{{ route('login') }}" class="mt-8">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block self-start mb-1 text-sm font-medium text-stone-900">
                        Username
                    </label>
                    <input type="text" id="email" name="email" placeholder="Username" :value="old('email')" required autofocus autocomplete="username" class="w-full px-9 py-2.5 text-sm font-light bg-stone-400 bg-opacity-10 rounded-[100px] text-zinc-500 max-md:px-5 max-md:max-w-full" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block self-start mb-1 text-sm font-medium text-stone-900">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Password" class="w-full px-9 py-2.5 text-sm font-light bg-stone-400 bg-opacity-10 rounded-[100px] text-zinc-500 max-md:px-5 max-md:max-w-full" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex flex-wrap items-center justify-between mt-2.5 max-w-full w-[453px]">
                    <div class="flex items-center mb-2 mr-4">
                        <input id="remember_me" type="checkbox" class="checkbox checkbox-primary w-4 h-4" name="remember" />
                        <label for="remember_me" class="ml-2 text-sm font-medium text-stone-900 cursor-pointer">
                            Remember me
                        </label>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="flex justify-center">
                    <button type="submit" class="px-16 py-2.5 mt-14 text-base text-center text-white whitespace-nowrap bg-bluePrimary rounded-[100px] w-[204px] max-md:px-5 max-md:mt-10">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-guest-layout>
