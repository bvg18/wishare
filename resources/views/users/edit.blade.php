@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
            <div class="col-8 offset2">

                <div class="row">
                    <h1>Edit profile</h1>
                </div>
                
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" 
                            value="{{ old('name') ?? $user->name }}"
                            autocomplete="name" 
                            autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="col-md-6">
                        <input 
                            id="description" 
                            type="text" 
                            class="form-control @error('description') is-invalid @enderror" 
                            name="description" 
                            value="{{ old('description') ?? $user->description }}" 
                            autocomplete="description" 
                            autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
<!--
                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                    <div class="col-md-6 ">
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/png, image/jpg" 
                            value="{{old('image')}}">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                </div>
            No funciona bien. Pendiente-->
                <div class="row">
                    <div class="col-md-4 ml-3"></div>
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>

</div>
@endsection