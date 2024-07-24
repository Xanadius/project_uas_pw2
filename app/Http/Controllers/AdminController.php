<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    // Category

    public function category()
    {
        $data = Category::all();
        return view('admin.category.index', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Category has been Added Successfully.');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data =  Category::find($id);

        return view('admin.category.edit', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data =  Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Category has been Updated Successfully.');

        return redirect('/admin/category');
    }

    public function delete_category($id)
    {
        $data =  Category::find($id);
        $data->delete();

        toastr()->timeOut(5000)->closeButton()->success('Category has been Deleted Successfully.');

        return redirect()->back();
    }

    // Product

    public function product()
    {
        $data = Product::paginate(3);

        return view('admin.product.index', compact('data'));
    }

    public function search_product(Request $request)
    {
        $search = $request->search;

        $data = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(3);

        return view('admin.product.index', compact('data'));
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.product.add', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->quantity;

        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Product has been Added Successfully.');

        return redirect()->back();
    }

    public function edit_product($id)
    {
        $data =  Product::find($id);

        $category = Category::all();

        return view('admin.product.edit', compact('data', 'category'));
    }

    public function update_Product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->quantity;

        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Product has been Updated Successfully.');

        return redirect('/admin/product');
    }

    public function delete_product($id)
    {
        $data =  Product::find($id);
        $image_path = public_path('products/' . $data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $data->delete();

        toastr()->timeOut(5000)->closeButton()->success('Product has been Deleted Successfully.');

        return redirect()->back();
    }

    // Order

    public function order()
    {
        $data = Order::paginate(5);

        return view('admin.order.index', compact('data'));
    }

    public function in_progress($id)
    {
        $data = Order::find($id);
        $data->status = 'In Progress';
        $data->save();

        return redirect('/admin/order');
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status = 'On The Way';
        $data->save();

        return redirect('/admin/order');
    }

    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();

        return redirect('/admin/order');
    }

    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = Pdf::loadView('admin.order.invoice', compact('order'));
        return $pdf->download('invoice.pdf');
    }
}
