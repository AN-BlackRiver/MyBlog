@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование тега</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <div class="container-fluid mt-2">
            <fieldset class="border p-2">
                <form method="POST" action="{{route('tags.update',$tag->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6">
                            <input name="title"
                            type="text"
                            class="form-control
                            @error('title')is-invalid @enderror"
                            id="title"
                            value="{{old('title') ? old('title') : $tag->title}}"
                            placeholder="Название категории"
                            >
                        @error('title')
                        <div id="title" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        </div>

                        <div class="col-4">
                            <button class="btn btn-primary" type="submit">Сохранить</button>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>

    </div>
@endsection
