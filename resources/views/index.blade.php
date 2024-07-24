<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Artisan Aroma Beans</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/admin/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="font-sans antialiased">
    <div class="bg-gray-100">
        <!-- Start of NavBar -->
        @include('layouts.navigation')
        <!-- End of NavBar -->

        <!-- Start of Hero Section -->
        @include('layouts.hero')
        <!-- End of Hero Section -->

        <!-- Start of Product List Section -->
        @include('layouts.list')
        <!-- End of Product List Section -->

        <!-- Start of Review Section -->
        @include('layouts.review')
        <!-- End of Review Section -->

        <!-- Start of About Section -->
        @include('layouts.about')
        <!-- End of About Section -->

        <!-- Start of Footer -->
        @include('layouts.footer')
        <!-- End of Footer  -->
    </div>
</body>

</html>
