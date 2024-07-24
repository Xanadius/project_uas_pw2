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
    @include('admin.js')

<body class="font-sans antialiased">
    <div class="bg-gray-100">
        <!-- Start of NavBar -->
        @include('layouts.navigation')
        <!-- End of NavBar -->

        <!-- Start of Cart Section -->
        <section>
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <div class="mx-auto max-w-3xl">
                    <header class="text-center">
                        <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Your Cart</h1>
                    </header>

                    <div class="mt-8">
                        <ul class="space-y-4">
                            @php
                                $value = 0;
                            @endphp
                            @foreach ($cart as $cart)
                                <li class="flex items-center gap-4">
                                    <img src="/products/{{ $cart->product->image }}" alt=""
                                        class="size-16 rounded object-cover" />

                                    <div>
                                        <h3 class="text-sm text-gray-900">{{ $cart->product->title }}</h3>

                                        <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                            <div>
                                                <dt class="inline">Category:</dt>
                                                <dd class="inline">{{ $cart->product->category }}</dd>
                                            </div>

                                            <div>
                                                <dt class="inline">Price:</dt>
                                                <dd class="inline">{{ $cart->product->price }}</dd>
                                            </div>
                                        </dl>
                                    </div>

                                    <div class="flex flex-1 items-center justify-end gap-2">
                                        <form>
                                            <label for="Line1Qty" class="sr-only"> Quantity </label>

                                            <input type="number" min="1" value="1" id="Line1Qty"
                                                class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                        </form>

                                        <a href="{{ url('delete_item', $cart->id) }}"
                                            class="text-gray-600 transition hover:text-red-600">
                                            <span class="sr-only">Remove item</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                                @php
                                    // $value = $value + $cart->product->price;
                                    // // $vat = ($value * 11) / 100;
                                    // $total_value = $value + $vat;
                                @endphp
                            @endforeach
                        </ul>

                        <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                            <div class="w-screen max-w-lg space-y-4">
                                {{-- <dl class="space-y-0.5 text-sm text-gray-700">
                                    <div class="flex justify-between">
                                        <dt>Subtotal</dt>
                                        <dd>{{ $value }} IDR</dd>
                                    </div>

                                    <div class="flex justify-between">
                                        <dt>VAT</dt>
                                        <dd>{{ $vat }} IDR</dd>
                                    </div>

                                    <div class="flex justify-between !text-base font-medium">
                                        <dt>Total</dt>
                                        <dd>{{ $total_value }} IDR</dd>
                                    </div>
                                </dl> --}}

                                <div class="flex justify-end">
                                    <a href="#" onclick="openModal(true)"
                                        class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                                        Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Cart Section -->

        {{-- Start of Modal --}}
        @include('user.modal')
        {{-- End of Modal --}}

        <!-- Start of Footer -->
        @include('layouts.footer')
        <!-- End of Footer  -->
    </div>
</body>

</html>
