@extends('personal.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <div class="container-fluid mt-4">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment )
                    <tr>
                        <th scope="row">{{$comment->id}}</th>
                        <td>{{$comment->message}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-info btn-sm mr-1" href="{{route('personal.show.comments',$comment->id)}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <div>
                                    <form onSubmit="return confirm('Подтвердите удаление комментария!')" method="post"
                                          action="{{route('personal.destroy.comments',$comment->id)}}">
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
            <div class="col">{{$comments->links()}}</div>
        </div>

    </div>
@endsection
