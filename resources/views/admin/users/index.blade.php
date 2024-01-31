@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid">
            <a class="btn btn-success" href="{{route('users.create')}}">Создать пользователя</a>
        </div>

        <div class="container-fluid mt-4">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user )
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-info btn-sm mr-1" href="{{route('users.show',$user->id)}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-success btn-sm mr-1" href="{{route('users.edit',$user->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <div>
                                    <form onSubmit="return confirm('Подтвердите удаление поста!')" method="post"
                                          action="{{route('users.destroy',$user->id)}}">
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
            <div class="col">{{$users->links()}}</div>
        </div>


    </div>
@endsection
