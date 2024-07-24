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
                    <h2 class="h5 no-margin-bottom">Update Product</h2>
                </div>
            </div>

            <!-- Input Data -->
            <form action="{{ url('update_product', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="input-group input-group-sm justify-content-center">
                    <tr>
                        <td>
                            <label for="title">Product Name</label>
                        </td>
                        <td>
                            <input type="text" name="title" id="title" value="{{ $data->title }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description">Product Description</label>
                        </td>
                        <td>
                            <textarea name="description" id="description" cols="30" rows="10" required>{{ $data->description }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="price">Product Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" id="price" value="{{ $data->price }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="category">Product Category</label>
                        </td>
                        <td>
                            <select name="category" id="category" required>
                                <option value="{{ $data->category }}">{{ $data->category }}</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="quantity">Product Quantity</label>
                        </td>
                        <td>
                            <input type="text" name="quantity" id="quantity" value="{{ $data->quantity }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="current_img">Current Image</label>
                        </td>
                        <td>
                            <img src="/products/{{ $data->image }}" alt="Product Image" height="200" width="200">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="new_img">New Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" id="image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Update Product" class="btn btn-primary">
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
