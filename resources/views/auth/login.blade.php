<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex justify-center items-center min-h-screen">
        <section
            class="flex flex-col items-center px-5 py-12 rounded-3xl border-t-2 border-l-2 bg-white bg-opacity-60 border-bluePrimary max-w-[684px] shadow-[2px_2px_6px_rgba(132,132,132,1)] mx-auto w-full sm:px-20 sm:pt-12 sm:pb-24">
            <div class="flex flex-col w-full max-w-[476px]">
                <img loading="lazy" src="{{ asset('images/logoUnhas.png') }}" alt="Hasanuddin University logo"
                    class="object-contain self-center ml-3 aspect-square w-[70px]" />
                <header class="flex flex-col px-3 mt-5 text-stone-900">
                    <h1 class="ml-4 text-2xl font-semibold text-center sm:text-left">
                        Welcome to Hasanuddin University
                    </h1>
                </header>
                <form method="POST" action="{{ route('login') }}" class="mt-8" x-data="{ showPassword: false }">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block self-start mb-1 text-sm font-medium text-stone-900">
                            Username
                        </label>
                        <input type="text" id="email" name="email" placeholder="Username" :value="old('email')"
                            required autofocus autocomplete="username"
                            class="w-full px-5 py-2.5 text-sm font-light bg-white bg-opacity-10 rounded-[100px] text-black focus:outline-none focus:ring-2 focus:ring-bluePrimary focus:bg-opacity-20 sm:px-9" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4 relative">
                        <label for="password" class="block self-start mb-1 text-sm font-medium text-stone-900">
                            Password
                        </label>
                        <input :type="showPassword ? 'text' : 'password'" id="password" name="password" placeholder="Password"
                            class="w-full px-5 py-2.5 text-sm font-light bg-white rounded-[100px] text-black focus:outline-none focus:ring-2 focus:ring-bluePrimary focus:bg-opacity-20 sm:px-9"
                            required autocomplete="current-password" />
                        <button type="button" class="absolute right-3 top-9 text-black focus:outline-none" @click="showPassword = !showPassword">
                            <template x-if="showPassword">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                                    <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                </svg>
                            </template>
                            <template x-if="!showPassword">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </template>
                        </button>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex flex-wrap items-center justify-between mt-4">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" class="checkbox checkbox-primary w-4 h-4 text-bluePrimary focus:ring-bluePrimary"
                                name="remember" />
                            <label for="remember_me" class="ml-2 text-sm font-medium text-stone-900 cursor-pointer">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div class="flex justify-center">
                        <button type="submit"
                            class="px-5 py-2.5 mt-10 text-base text-center text-white whitespace-nowrap bg-bluePrimary rounded-[100px] w-full max-w-[204px] sm:px-16 sm:mt-14 focus:outline-none focus:ring-2 focus:ring-bluePrimary focus:ring-offset-2">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-guest-layout>
