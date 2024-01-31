@extends('admin.layouts.main')

@section('content')


    <div class="content-wrapper">
        <div class="mt-3">
            <div class="container-fluid">
                <div class="row ml-3">
                    <label>Имя</label> <p>{{$user->name}}</p>
                </div>

                <div class="row ml-3">
                    <label>Email</label> <p>{{$user->email}}</p>
                </div>
            </div>
        </div>


    </div>
@endsection
