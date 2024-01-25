<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tags.index', ['tags' => Tag::paginate(5)]);
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate(['title' => mb_strtolower($data['title'])]);
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', ['tag'=>$tag]);
    }

    public function update(Tag $tag, UpdateRequest $request)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }

}
