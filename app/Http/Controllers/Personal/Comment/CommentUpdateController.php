<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;

class CommentUpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Comment $comment)
   {
       $comment->update($request->validated());
       return redirect()->route('personal.comments');
   }
}
