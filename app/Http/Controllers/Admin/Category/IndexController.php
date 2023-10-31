<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.сategories.index', ['categories' => Category::paginate(10)]);
    }
}
