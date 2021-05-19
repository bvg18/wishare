@extends('layouts.app')
@section('content')
<style>
    a{
    color:black;
    }
    a:hover{
        color:#517664;
        text-decoration: none;
    }
    
    .list-group-item{
        border:none;
        border-radius: 15px !important;
        transition: all .1s ease;
    }
    .list-group-item:hover{
        background-color:#d6e5e3;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
         
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Search Users</h3>
                </div>
                     
                <div class="card-body">
                    <form action="{{action('UserController@search')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-8">

                                <div class="input-group">

                                    
                                    <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user" autofocus>
                                    <div class="input-group-append">
                                        <button class="btn btn-verde-oscuro">Search</button>
                                    </div>

                                    @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                        
                                </div>

                                

                                
                            </div>
                        </div>
                    </form>
                    <div class="mt-5 row justify-content-center">
                        <div class="col-12 col-md-8">
                            <ul class="list-group">
                                @foreach($users as $user)
                                <a href="{{ '/user/' . $user->id }}">
                                    <li class="list-group-item d-flex shadow mb-3">
                                        
                                        <div class="image-parent mr-3" style="max-width:40px">
                                            <img src="{{ 'img/users/' . $user->image}}" class="img-fluid rounded-circle">
                                        </div>
                                        <h5>{{ $user->name }}</h3>
                                    </li>
                                </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
</div>
@endsection