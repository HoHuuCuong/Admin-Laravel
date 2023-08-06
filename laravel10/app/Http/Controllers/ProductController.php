<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::orderBy('created_at', 'DESC')->search()->paginate(5);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('upload')) {
            $file = $request->upload;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('upload/product'), $file_name);
        }
        $request->merge(['image' => 'upload/product/' . $file_name]);
        if (Product::create($request->all())) {
            return redirect()->route('product.index')->with('success', 'Them moi san pham thanh cong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->details()->count() > 0) {
            return redirect()->route('product.index')->with('error', 'Không thể xóa sản phẩm này');
        } else {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Xóa sản phẩm  thành công');
        }
    }
}