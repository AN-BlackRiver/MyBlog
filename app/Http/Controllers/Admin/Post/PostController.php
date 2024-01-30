<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BaseController
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::OrderBy('id', 'DESC')->paginate(5)]);
    }

    public function create()
    {
        return view('admin.posts.create', ['categories' => Category::all(), 'tags' => Tag::all()]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post, 'categories' => Category::all(), 'tags' => Tag::all()]);
    }

    public function store(StoreRequest $request)
    {

        $this->service->store($request->validated());

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', ['post' => $post]);
    }

    public function update(Post $post, UpdateRequest $request)
    {

        $this->service->update($request->validated(), $post);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

}
