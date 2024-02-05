<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function __invoke()
    {
        return view('personal.likes.index', ['posts' => auth()->user()->likedPosts()->paginate(5)]);
    }
}
