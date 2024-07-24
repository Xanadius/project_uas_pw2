<!DOCTYPE html>
<html>

<head>
    <title>Order #{{ $order->id }}</title>
</head>

<body>
    <h1>Order #{{ $order->id }}</h1>
    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Address:</strong> {{ $order->rec_address }}</p>
    <p><strong>Phone Number:</strong> {{ $order->phone_num }}</p>
    <p><strong>Product:</strong> {{ $order->product->title }}</p>
    <p><strong>Price:</strong> {{ $order->product->price }}</p>
    <img src="products/{{ $order->product->image }}" alt="" srcset="" width="150">
    <p><strong>Order Status:</strong> {{ $order->status }}</p>
</body>

</html>
