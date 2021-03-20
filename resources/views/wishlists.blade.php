@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wishlists de {{$user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group list-group-flush">
                    @if (count($wishlists)  < 1)
                        <li class="list-group-item" > Ninguna Wishlist</li>
                    @else
                        @foreach($wishlists as $wishlist)
                            <li class="list-group-item" >
                                <a href="{{action('WishlistController@showWishlist', [$wishlist->id]) }}">{{$wishlist->name}}</a>
                            </li>
                            
                        @endforeach
                    @endif
                    </ul>
                    
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
