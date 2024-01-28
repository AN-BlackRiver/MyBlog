<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        try {
            $data = $request->validated();

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $tagIds = $data['tag_ids'];

            unset($data['tag_ids']);

            $post = Post::firstOrCreate($data);

            $post->tags()->attach($tagIds);

            return redirect()->route('posts.index');
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', ['post' => $post]);
    }

    public function update(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }

        $tagIds = $data['tag_ids'];

        unset($data['tag_ids']);

        $post->update($data);

        $post->tags()->sync($tagIds);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

}
