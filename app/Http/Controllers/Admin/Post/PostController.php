<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::OrderBy('id', 'DESC')->paginate(5)]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        }

        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/images', $data['main_image']);
        }

        Post::firstOrCreate($data);
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', ['post' => $post]);
    }

    public function update(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

}
