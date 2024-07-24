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
                    <h2 class="h5 no-margin-bottom">Categories</h2>
                </div>
            </div>

            <!-- Input -->
            <div>
                <form action="{{ url('add_category') }}" method="post"
                    class="input-group input-group-sm justify-content-end">
                    @csrf
                    <input type="text" name="category" class="input-group-prepend">
                    <button type="submit" class="btn btn-secondary">Add Category</button>
                </form>
            </div>

            <!-- Data Table -->
            <table class="table table-striped table-dark mt-3 ">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td>{{ $data->category_name }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td>
                                <a href="{{ url('edit_category', $data->id) }}" class="btn btn-success mr-2">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="{{ url('delete_category', $data->id) }}" class="btn btn-danger"
                                    onclick="confirmation(event)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <!-- End of Admin Panel -->

    <!-- JavaScript -->
    @include('admin.js')
</body>

</html>
