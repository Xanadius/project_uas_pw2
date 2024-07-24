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
                    <h2 class="h5 no-margin-bottom">Products List</h2>
                </div>

            </div>

            <!-- Data Search -->
            <form action="{{ url('search_product') }}" method="get">
                @csrf
                <table class="input-group mb-3 row-2 justify-content-end">
                    <tr>
                        <td>
                            <input type="search" name="search" id="search" class="form-control"
                                aria-describedby="button-addon2">
                        </td>
                        <td>
                            <input class="btn btn-outline-light" type="submit" id="button-addon2" value="Search">
                        </td>
                    </tr>
                </table>
            </form>

            <!-- Data Table -->
            <table class="table table-striped table-dark mt-3 ">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Images</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $products)
                        <tr>
                            <th scope="row">{{ $products->id }}</th>
                            <td>{{ $products->title }}</td>
                            <td class="text-justify">{!! Str::limit($products->description, 50) !!}</td>
                            <td>{{ $products->price }}</td>
                            <td class="text-center">{{ $products->quantity }}</td>
                            <td>
                                <img src="/products/{{ $products->image }}" alt="Product Image" width="100">
                            </td>
                            <td>
                                <a href="{{ url('edit_product', $products->id) }}" class="btn btn-success mr-2">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="{{ url('delete_product', $products->id) }}" class="btn btn-danger"
                                    onclick="confirmation(event)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
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
