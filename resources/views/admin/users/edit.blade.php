@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя {{$user->name}}</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid ">
            <fieldset class="border p-2">
                <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="col-6">
                            <input name="name" type="text"
                                   class="form-control @error('name')is-invalid @enderror"
                                   id="name" placeholder="Имя"
                                   value="{{old('name')? old('name'): $user->name}}"
                            >
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-6 mt-3 mb-3">
                            <input name="email" type="email"
                                   class="form-control @error('email')is-invalid @enderror"
                                   id="email" placeholder="Email"
                                   value="{{old('email') ? old('email') : $user->email}}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Категория</label>
                                <select name="role" class="form-control">
                                    <option value="" disabled selected>Выберите категорию</option>
                                    @foreach($roles as $index  => $role)
                                        <option value="{{$index}}" {{$user->role == $index ? 'selected': ''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

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
