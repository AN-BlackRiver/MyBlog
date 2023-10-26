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
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
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
                            required>
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
