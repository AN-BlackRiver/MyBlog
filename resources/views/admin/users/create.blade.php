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

        <div class="container-fluid ">
            <fieldset class="border p-2">
                <legend class="w-auto r-3-2">
                    Новый пользователь
                </legend>
                <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-6">
                            <input name="name" type="text"
                                   class="form-control @error('name')is-invalid @enderror"
                                   id="name" placeholder="Имя"
                                   value="{{old('name')}}">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-6 mt-3">
                            <input name="email" type="email"
                                   class="form-control @error('email')is-invalid @enderror"
                                   id="email" placeholder="Email"
                                   value="{{old('email')}}">
                            @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-6 mt-3 mb-3">
                            <input name="password" type="text"
                                   class="form-control @error('password')is-invalid @enderror"
                                   id="password" placeholder="Пароль"
                                   value="{{old('password')}}">
                            @error('password')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <select name="role" class="form-control @error('role')is-invalid @enderror">
                                    <option value="" disabled selected>Выберите роль</option>
                                    @foreach($roles as $index => $role)
                                        <option value="{{$index}}" {{$index === old('role') ? 'selected': ''}}>{{$role}}</option>
                                    @endforeach
                                </select>

                                @error('role')
                                <div class="text-danger ">{{$message}}</div>
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
