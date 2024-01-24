<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(Category $category, UpdateRequest $request)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.categories');
    }
}
