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
                    <h2 class="h5 no-margin-bottom">Update Category</h2>
                </div>
            </div>

            <!-- Input -->
            <div>
                <form action="{{ url('update_category', $data->id) }}" method="post"
                    class="input-group input-group-sm justify-content-center">
                    @csrf
                    <input type="text" name="category" class="input-group-prepend"
                        value="{{ $data->category_name }}">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>

        </div>
    </div>
    <!-- End of Admin Panel -->

    <!-- JavaScript -->
    @include('admin.js')
</body>

</html>
