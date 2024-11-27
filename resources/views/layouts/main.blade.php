<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hasanuddin University')</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-GbYbsDQICZmsLflkONJi8uDNMpwpmjOZIjZBneWbSIl1h8As4EG3eFZ5JyxOH9CkRAXBzKGxOxoE94pRHUV7jQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="flex flex-col min-h-screen">
    @include('partials.header')
    <main class="flex-grow">
        @include('partials.hero')
        @yield('content')
    </main>
    @include('partials.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-gu/XzFzMIKlB6WwvAv1UpDSMA43CmrutkSfBRj+Tu+kCqCn++ppopxCw5YIgTPGdfAPd9a3MBI5krY1WdgGfmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
