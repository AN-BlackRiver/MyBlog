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

        <div class="container-fluid">
            <a class="btn btn-success" href="{{ route('posts.create') }}">Создать пост</a>
        </div>
        <div class="container-fluid mt-4">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Содержание</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post )
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{mb_substr($post->content,0, 10) . "..."}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-info btn-sm mr-1" href="{{route('posts.show',$post->id)}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-success btn-sm mr-1" href="{{route('posts.edit',$post->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <div>
                                    <form onSubmit="return confirm('Подтвердите удаление поста!')" method="post"
                                          action="{{route('posts.destroy',$post->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col">{{$posts->links()}}</div>
        </div>


    </div>
@endsection
