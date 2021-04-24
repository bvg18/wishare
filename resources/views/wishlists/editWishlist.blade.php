@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{action('WishlistController@editWishlist')}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
            <div class="col-8 offset2">

                <div class="row">
                    <h1>Edit Wishlist</h1>
                </div>
                
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" class="form-control" type="text" name="name" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <input id="description" class="form-control" type="text" name="description">
                    </div>
                </div>
                <div>
                    <input type="hidden" name="wishlist_id" value = {{$wishlist_id}}>
                </div>


                
                <div class="row">
                    <div class="col-md-4 ml-3"></div>
                    <button class="btn btn-primary">update wishlist</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
<div >
</div>