@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid mt-2">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Дата обновления</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $categories as $category )
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->title}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>
                            <div>
                                <a class="btn btn-info btn-sm" href="{{route('admin.category.show',$category->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col">{{$categories->links()}}</div>
        </div>

        <div class="container-fluid mt-4">
            <fieldset class="border p-2">
                <legend class="w-auto r-3-2">
                    Добавление категории
                </legend>
                <form method="post" action="{{ route('admin.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <input name="title"
                            type="text"
                            class="form-control
                            @error('title')is-invalid @enderror"
                            id="title"
                            placeholder="Название категории"
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

    </div>
@endsection
