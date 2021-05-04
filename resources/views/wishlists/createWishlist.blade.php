@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{action('WishlistController@addNewWishlist')}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
            <div class="col-8 offset2">

                <div class="row">
                    <h1>Create New Wishlist</h1>
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

                    <label class="col-md-4 col-form-label text-md-right" for= "private"> Private </label>
                    <div class="d-flex flex-wrap align-content-center col-md-4">
                        <input type="checkbox" id="private" name="private" value="true">
                        
                    </div>
                </div>

              
                
                <div class="row">
                    <div class="col-md-4 ml-3"></div>
                    <button class="btn btn-primary">Create new wishlist</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
<div >
</div>