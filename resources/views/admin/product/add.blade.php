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
                    <h2 class="h5 no-margin-bottom">Add Product</h2>
                </div>
            </div>

            <!-- Input Data -->
            <form action="{{ url('/upload_product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="input-group input-group-sm justify-content-center">
                    <tr>
                        <td>
                            <label for="title">Product Name</label>
                        </td>
                        <td>
                            <input type="text" name="title" id="title" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description">Product Description</label>
                        </td>
                        <td>
                            <textarea name="description" id="description" cols="30" rows="10" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="price">Product Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" id="price" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="category">Product Category</label>
                        </td>
                        <td>
                            <select name="category" id="category" required>
                                <option value="Select an Option">-- Select an Option --</option>
                                @foreach ($category as $data)
                                    <option value="{{ $data->category_name }}">{{ $data->category_name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="quantity">Product Quantity</label>
                        </td>
                        <td>
                            <input type="text" name="quantity" id="quantity" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="image">Product Images</label>
                        </td>
                        <td>
                            <input type="file" name="image" id="image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Add Product" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- End of Admin Panel -->

    <!-- JavaScript -->
    @include('admin.js')
</body>

</html>
