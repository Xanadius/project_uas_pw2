<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Admin - Artisan Aroma Beans</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- CSS -->
    @include('admin.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Start of NavBar -->
    @include('admin.navbar')
    <!-- End of NavBar -->

    <!-- Start of Admin Panel -->
    <div class="d-flex align-items-stretch">
        <!-- Start of Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- End of Sidebar Navigation -->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Orders List</h2>
                </div>

            </div>

            <!-- Data Table -->
            <table class="table table-striped table-dark mt-3 ">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Product Images</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $orders)
                        <tr>
                            <th scope="row">{{ $orders->id }}</th>
                            <td>{{ $orders->name }}</td>
                            <td class="text-justify">{!! Str::limit($orders->rec_address, 50) !!}</td>
                            <td>{{ $orders->phone_num }}</td>
                            <td>{{ $orders->product->title }}</td>
                            <td>{{ $orders->product->price }} IDR</td>
                            <td>
                                <img src="/products/{{ $orders->product->image }}" alt="Product Image" width="100">
                            </td>
                            <td class="text-center">
                                @if ($orders->status == 'Waiting to be Processed')
                                    <span style="color: red">{{ $orders->status }}</span>
                                @elseif($orders->status == 'In Progress')
                                    <span style="color: yellow">{{ $orders->status }}</span>
                                @elseif($orders->status == 'On The Way')
                                    <span style="color: skyblue">{{ $orders->status }}</span>
                                @else
                                    <span style="color: green">{{ $orders->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div x-data="{ open: false }" class="relative">
                                    <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                                        <a href="{{ url('/print_pdf', $orders->id) }}"
                                            class="border-e px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                            Print
                                        </a>
                                        <button @click="open = !open"
                                            class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                            <span class="sr-only">Menu</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div x-show="open" @click.away="open = false"
                                        class="absolute right-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white"
                                        role="menu">
                                        <div class="p-2">
                                            <strong class="p-2 text-xs font-medium uppercase text-gray-400">
                                                Change Order Status
                                            </strong>
                                            <x-dropdown-link href="{{ url('in_progress', $orders->id) }}"
                                                class="btn btn-outline-warning">
                                                In Progress <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                                            </x-dropdown-link>
                                            <x-dropdown-link href="{{ url('on_the_way', $orders->id) }}"
                                                class="btn btn-outline-info">
                                                On The Way <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                                            </x-dropdown-link>
                                            <x-dropdown-link href="{{ url('delivered', $orders->id) }}"
                                                class="btn btn-outline-success">
                                                Delivered <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                                            </x-dropdown-link>
                                        </div>
                                    </div>
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex p-2 justify-content-center">
                {{ $data->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
    <!-- End of Admin Panel -->

    <!-- JavaScript -->
    @include('admin.js')
</body>

</html>
