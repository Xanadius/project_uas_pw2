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

        <!-- Start of Product Detail Section -->
        <section class="bg-white" id="products">
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <header class="text-center">
                    <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Detail Produk</h2>
                </header>
                <a href="#" class="group block">
                    <img src="/products/{{ $products->image }}" alt=""
                        class="h-[350px] w-full object-cover sm:h-[450px]" />

                    <div class="mt-3 justify-between text-sm">
                        <div>
                            <h3 class="text-gray-900 group-hover:underline group-hover:underline-offset-4">
                                {{ $products->title }}
                            </h3>

                            <p class="mt-1.5 text-pretty text-xs text-gray-500">
                                {{ $products->description }}
                            </p>
                        </div>

                        <p class="text-gray-900 mt-3 text-pretty text-sm">{{ $products->price }}</p>

                        <p class="text-gray-900 mt-3 text-pretty text-sm">Stok : {{ $products->quantity }}</p>
                    </div>
                </a>
            </div>
        </section>
        <!-- End of Product Detail Section -->

        <!-- Start of Footer -->
        @include('layouts.footer')
        <!-- End of Footer  -->
    </div>
</body>

</html>
