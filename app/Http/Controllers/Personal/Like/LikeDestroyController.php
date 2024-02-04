<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikeDestroyController extends Controller
{
   public function __invoke(Post $post)
   {
        auth()->user()->likedPosts()->detach($post);
       return redirect()->route('personal.like');
   }
}
