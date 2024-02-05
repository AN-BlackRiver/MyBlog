<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('blog.main.index', [
                'posts' => Post::paginate(6),
                'randomPost' => Post::get()->random(4)
            ]
        );
    }
}
