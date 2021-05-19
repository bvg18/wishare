@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{action('WishlistController@editWishlist')}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Wishlist</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row justify-content-center">
                            <label for="name" class="col-md-8 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') ?? $wishlist->name }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="description" class="col-md-8 col-form-label">{{ __('Description') }}</label>

                            <div class="col-md-8">
                                <input id="description" class="form-control" type="text" value="{{ old('description') ?? $wishlist->description }}" name="description">
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="wishlist_id" value = {{$wishlist_id}}>
                        </div>

                        <div class="form-group row justify-content-center"> 
                            <div class="d-flex flex-wrap col-md-8">
                                <label class="col-form-label mr-3" for= "private"> Private </label>
                                @if($wishlist->private)
                                <input type="checkbox" id="private" name="private" value="true" checked>
                                @else
                                <input type="checkbox" id="private" name="private" value="true">
                                @endif  
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">
                            <div class="col-md-8 ">
                            <button class="btn btn-verde-oscuro btn-block">update wishlist</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
<div >
</div>