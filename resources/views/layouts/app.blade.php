<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen bg-blue-50 flex">

        <!-- Sidebar Navigation -->
        @include('layouts.navigation')

        <!-- Main Content Area -->
        <div class="flex-1 ml-3/4 sm:ml-1/3 md:ml-1/4 lg:ml-[270px]">
            <!-- Page Heading -->
            @isset($header)
                <header>
                    <div class="w-auto mx-6 py-6 px-3">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @if (auth()->user()->hasRole('admin'))
                    <div class="admin-layout">
                        {{ $slot }}
                    </div>
                @elseif(auth()->user()->hasRole('staff'))
                    <div class="staff-layout">
                        {{ $slot }}
                    </div>
                @elseif(auth()->user()->hasRole('student'))
                    <div class="student-layout">
                        {{ $slot }}
                    </div>
                @endif
            </main>
        </div>
    </div>
</body>

</html>
