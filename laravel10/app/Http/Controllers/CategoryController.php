<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Category::orderBy('created_at', 'DESC')->paginate(5);
        //  them search
        $data = Category::orderBy('created_at', 'DESC')->search()->paginate(5);
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        if (Category::create($request->all())) {
            return redirect()->route('category.index')->with('success', 'Them moi danh muc thanh cong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        // $request->validate(
        //     [
        //         'name' => 'required|unique:category,name,' . $category->id,
        //         'prioty' => 'required'
        //     ],
        //     [
        //         'name.required' => 'Tên danh mục không được để trống',
        //         'name.unique' => 'Danh mục này đã tồn tại',
        //         'prioty.required' => "Thứ tự ưu tiên không được để trống"
        //     ]
        // );

        $category->update($request->only('name', 'prioty', 'status'));
        return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->products->count() > 0) {
            return redirect()->route('category.index')->with('error', 'Không thể xóa danh mục này');
        } else {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công');
        }
    }
}