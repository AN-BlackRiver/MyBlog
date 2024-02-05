@extends('personal.layouts.main')

@section('content')
<div class="content-wrapper">

    <div class="container-fluid">
        <fieldset class="border p-2">
            <legend class="w-auto r-3-2">
                Редактирование комментария
            </legend>
            <form method="post" action="{{route('personal.update.comments',$comment->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">

                    <div class="col-12 mt-3">
                        <textarea class="form-control @error('content')is-invalid @enderror"
                                      name="message">{{$comment->message}}</textarea>
                        @error('content')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="col-4 mt-3">
                        <button class="btn btn-primary" type="submit">Cохранить</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
</div>

@endsection
