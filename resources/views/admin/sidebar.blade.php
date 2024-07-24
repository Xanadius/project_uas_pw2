<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('/admin/img/avatar-6.jpg') }}" alt="..."
                class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">{{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->user_type }}</p>
        </div>
    </div>

    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li>
            <a href="{{ url('/admin/dashboard') }}">
                <i class="icon-home"></i>
                Home
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/category') }}">
                <i class="fa fa-tags"></i>
                Category
            </a>
        </li>
        <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="fa fa-coffee"></i>
                Products
            </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li>
                    <a href="{{ url('/admin/product') }}">Products List</a>
                </li>
                <li>
                    <a href="{{ url('/admin/add_product') }}">Add Product</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ url('/admin/order') }}">
                <i class="fa fa-hourglass"></i>
                Orders
            </a>
        </li>
    </ul>

</nav>
