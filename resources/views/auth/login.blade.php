<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="flex flex-col items-center px-20 pt-12 pb-24 rounded-3xl border-t-2 border-l-2 bg-white bg-opacity-60 border-bluePrimary max-w-[684px] shadow-[2px_2px_6px_rgba(132,132,132,1)] max-md:px-5 max-md:pb-24">
        <div class="flex flex-col w-full max-w-[476px] max-md:max-w-full">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/d95be072c0b08afd2c8e7f98e842761d38899ace039283ab5f3648b494aa1340?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="Hasanuddin University logo" class="object-contain self-center ml-3 aspect-square w-[70px]" />
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

                <!-- Remember Me -->
                <div class="flex flex-wrap items-center justify-between mt-2.5 max-w-full w-[453px]">
                    <div class="flex items-center mb-2 mr-4">
                        <input id="remember_me" type="checkbox" class="sr-only" name="remember">
                        <label for="remember_me" class="flex items-center text-sm font-medium text-stone-900 cursor-pointer">
                            <span class="flex-shrink-0 w-[15px] h-[15px] mr-1.5 border border-black border-t-2 border-l-2 bg-bluePrimary rounded-[100px]"></span>
                            Remember me
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs font-medium text-right text-stone-900 mb-2">
                            {{ __('Forget Password?') }}
                        </a>
                    @endif
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
