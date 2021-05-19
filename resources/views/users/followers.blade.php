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
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Followers</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-baseline">
                        <h1> Followers of {{$user->name}} </h1>
                    </div>
                    
                    <table class="table table-striped">
                        <tr>
                            <th>Image</th-->
                            <th>Name </th>
                            <th>   </th> 
                            
                        </tr>
                    @foreach($followers as $followUser)
                        <tr>
                            <td>
                                <img src="{{ asset('img/users/' . $followUser->image) }}" class="img-fluid rounded-circle" alt="No disponible" width="50" height="50">
                            </td-->
                            <td>
                                <a href="{{action('UserController@showUser', [$followUser->id]) }}">
                                {{$followUser->name}}
                                </a>
                            </td>
                            
                            <td></td>
                            
                        </tr>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
