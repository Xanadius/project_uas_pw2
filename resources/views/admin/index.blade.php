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
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>
            @include('admin.content')
        </div>
    </div>
    <!-- End of Admin Panel -->

    <!-- JavaScript -->
    @include('admin.js')
</body>

</html>
