<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.сategories.index', ['categories' => Category::paginate(5)]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::query()->firstOrCreate(['title' => mb_strtolower($data['title'])]);
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.сategories.show', ['category'=>$category]);
    }

    public function update(Category $category, UpdateRequest $request)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
