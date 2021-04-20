@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{action('ProductController@addProductToWishlist', [$wishlist->id])}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
            <div class="col-8 offset2">

                <div class="row">
                    <h1>Add new product in {{$wishlist->name}}</h1>
                </div>
                
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                    <div class="col-md-6">
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                    <div class="col-md-6">
                        <!--input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus-->
                        
                        <select class="form-control" id="category" name="category" type="">
                            @foreach($categories as $category)
                            <option value="{{ $category-> id }}"> {{ $category-> name }}</option>
                            @endforeach
                            </select>
                            

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Product Image</label>
                    <div class="col-md-6 ">
                        <input type="file" name="image" accept="image/png, image/jpg" value="{{old('image')}}">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 ml-3"></div>
                    <button class="btn btn-primary">Add product</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
<div >
</div>