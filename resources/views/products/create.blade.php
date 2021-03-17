@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/product" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset2">

                <div class="row">
                    <h1>Add new product</h1>
                </div>
                
                <div class="form-group row">
                    <label for="wishlist" class="col-md-4 col-form-label text-md-right">{{ __('Wishlist') }}</label>

                    <div class="col-md-6">
                        <input id="wishlist" type="text" class="form-control @error('wishlist') is-invalid @enderror" name="wishlist" value="{{ old('wishlist') }}" required autocomplete="wishlist" autofocus>

                        @error('wishlist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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
                    <label for="image" class="col-md-4 col-form-label text-md-right">Product Image</label>
                    <div class="col-md-6 ">
                        <input type="file", class="form-control-file pt-2" id="image" url="image">
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