<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.main.index', [
                'usersCount' => User::count(),
                'postsCount' => Post::count(),
                'categoryCount' => Category::count(),
                'tagCount' => Tag::count(),
            ]
        );
    }
}
