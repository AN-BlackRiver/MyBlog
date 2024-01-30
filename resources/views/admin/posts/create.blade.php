@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid ">
            <fieldset class="border p-2">
                <legend class="w-auto r-3-2">
                    Добавление поста
                </legend>
                <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-6">
                            <input name="title" type="text"
                                   class="form-control @error('title')is-invalid @enderror"
                                   id="title" placeholder="Заголовок поста"
                                   value="{{old('title')}}"
                            >
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <textarea id="summernote" class="form-control @error('content')is-invalid @enderror"
                                      name="content">{{old('content')}}</textarea>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Категория</label>
                                <select name="category_id"
                                        class="form-control @error('category_id')is-invalid @enderror">
                                    <option value="" disabled selected>Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected': ''}}>
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>Выберите тэги</label>
                                <select name="tag_ids[]" class="select2 @error('tag_ids')is-invalid @enderror"
                                        multiple="multiple" data-placeholder="Выберите тэг" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected': ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('tag_ids')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="exampleInputFile">Добавить превью изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input value="{{old('preview_image')}}" name="preview_image" type="file"
                                           class="custom-file-input @error('preview_image')is-invalid @enderror"
                                           id="exampleInputFile">
                                    <label class="custom-file-label">Выбрать файл</label>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-6 mt-3 mb-3">
                            <label for="exampleInputFile">Добавить главное изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input value="{{old('main_image')}}" name="main_image" type="file"
                                           class="custom-file-input @error('main_image')is-invalid @enderror"
                                           id="exampleInputFile">
                                    <label class="custom-file-label">Выбрать файл</label>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
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
