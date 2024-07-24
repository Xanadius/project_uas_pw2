<section class="bg-white" id="products">
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <header class="text-center">
            <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Daftar Produk</h2>
        </header>

        <ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($product as $products)
                <li>
                    <a href="#" class="group relative block overflow-hidden">
                        <img src="/products/{{ $products->image }}" alt=""
                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" />

                        <div class="relative border border-gray-100 bg-white p-6">

                            <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $products->title }}</h3>

                            <p class="mt-1.5 text-sm text-gray-700">{{ $products->price }}</p>

                            <form class="mt-4">
                                <table>
                                    <tr>
                                        <td class="px-2 py-2">
                                            <a class="block w-full rounded bg-teal-600 p-4 text-sm font-small transition hover:scale-105"
                                                href="{{ url('product', $products->id) }}">
                                                Product Details
                                            </a>
                                        </td>
                                        <td>
                                        <td>
                                            <a class="block w-full rounded bg-gray-300 p-4 text-sm font-small transition hover:scale-105"
                                                href="{{ url('add_cart', $products->id) }}">
                                                Add to Cart
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
