@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
         
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Search</div>
                     
                <div class="card-body">
                    <div>
                    <form action="{{action('UserController@search')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-8 offset2">

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Search user</label>

                                    <div class="col-md-6">
                                        <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user" autofocus>

                                            @error('user')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-3"></div>
                                    <button class="btn btn-primary">Search user</button>
                                </div>

                                <ul class="list-group">
                                    @foreach($users as $user)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="{{ '/user/' . $user->id }}">{{ $user->name }}</a>
                                        <div class="image-parent" style="max-width:40px">
                                            <img src="{{ 'img/users/' . $user->image}}" class="img-fluid">
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                 
            </div>
        </div>
    </div>
</div>
@endsection