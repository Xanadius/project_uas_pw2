<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', 'user')->get()->count();
        $orders = Order::where('status', 'delivered')->get()->count();
        $categories = Category::all()->count();
        $products = Product::all()->count();

        return view('admin.index', compact('users', 'orders', 'categories', 'products'));
    }

    public function landing()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }

        return view('index', compact('product', 'count'));
    }

    public function landingLogin()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id)->count();
        }

        return view('index', compact('product', 'count'));
    }

    public function product($id)
    {
        $products = Product::find($id);

        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }

        return view('user.details', compact('products', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Product has been Added to the Cart Successfully.');

        return redirect()->back();
    }

    public function my_cart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id)->count();

            $cart = Cart::where('user_id', $user_id)->get();
        }

        return view('user.cart', compact('count', 'cart'));
    }

    public function delete_item($id)
    {
        $data =  Cart::find($id);
        $data->delete();

        toastr()->timeOut(5000)->closeButton()->success('Item has been Deleted Successfully from the Cart.');

        return redirect()->back();
    }

    public function place_order(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $cart = Cart::where('user_id', $user_id)->get();

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        foreach ($cart as $carts) {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone_num = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->save();
        }

        $cart_remove = Cart::where('user_id', $user_id)->get();

        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(15000)->closeButton()->success('Your Order has been Placed Successfully.\nPlease Kindly Wait as Your Order will be Processed as soon as possible');

        return redirect()->back();
    }
}
