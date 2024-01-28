@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid ">
            <fieldset class="border p-2">
                <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="col-6">
                            <input name="title" type="text"
                                   class="form-control @error('title')is-invalid @enderror"
                                   id="title" placeholder="Заголовок поста"
                                   value="{{old('title')? old('title'): $post->title}}"
                            >
                            @error('title')
                            <div id="title" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <textarea id="summernote" class="form-control @error('content')is-invalid @enderror" name="content">{{old('content')? old('content'): $post->content}}</textarea>
                            @error('content')
                            <div id="content" class="invalid-feedback mb-3">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Категория</label>
                                <select name="category_id" class="form-control">
                                    <option selected>Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected': ''}}>
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6 m-2">
                            <div class="form-group">
                                <label>Выберите тэги</label>
                                <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Выберите тэг" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected': ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <img src="{{asset('storage/'. $post->preview_image)}}" alt="preview_image" class="w-50">
                        </div>

                        <div class="col-6">
                            <label for="exampleInputFile">Изменить превью изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input value="{{old('preview_image')}}" name="preview_image" type="file" class="custom-file-input @error('preview_image')is-invalid @enderror" id="exampleInputFile">
                                    <label class="custom-file-label">Выбрать файл</label>
                                </div>
                                @error('preview_image')
                                <div id="content" class="invalid-feedback mb-3">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mt-2">
                            <img src="{{asset('storage/'. $post->main_image)}}" alt="main_image" class="w-50">
                        </div>

                        <div class="col-6 mt-3 mb-3">
                            <label for="exampleInputFile">Изменить главное изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input value="{{old('main_image')}}" name="main_image" type="file" class="custom-file-input @error('main_image')is-invalid @enderror" id="exampleInputFile">
                                    <label class="custom-file-label">Выбрать файл</label>
                                </div>
                                @error('main_image')
                                <div id="content" class="invalid-feedback mb-3">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-4">
                            <button class="btn btn-primary" type="submit">Добавить</button>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>

    </div>
@endsection
