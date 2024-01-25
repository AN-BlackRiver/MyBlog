@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Теги</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid ">
            <fieldset class="border p-2">
                <legend class="w-auto r-3-2">
                    Добавление тега
                </legend>
                <form method="post" action="{{ route('tags.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <input name="title"
                                   type="text"
                                   class="form-control
                            @error('title')is-invalid @enderror"
                                   id="title"
                                   placeholder="Название тега"
                            >
                            @error('title')
                            <div id="title" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-4">
                            <button class="btn btn-primary" type="submit">Добавить</button>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>

        <div class="container-fluid mt-4">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Дата создания</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag )
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->title}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-info btn-sm mr-1" href="{{route('tags.show',$tag->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <div>
                                    <form onSubmit="return confirm('Подтвердите удаление категории!')" method="post" action="{{route('tags.destroy',$tag->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col">{{$tags->links()}}</div>
        </div>


    </div>
@endsection
