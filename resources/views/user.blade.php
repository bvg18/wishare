@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2">
            <img src="{{ asset('img/profile.jpg') }}" alt="No disponible" class="rounded-circle" width="100" height="100" >
        </div>
        <div class="col-10">
            <div>
                <h1>{{$user->name}}</h1>
            </div>
            <div><strong>{{$count}}</strong> wishlists</div>
            <div><strong>{{$followersC}}</strong> followers</div>
            <div><strong>{{$followsC}}</strong> following</div>
        </div>
    </div>
    <div class="row" style="height: 1rem">
    </div>
    <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Wishlists
            </div>
            <ul class="list-group list-group-flush">
                @foreach($wishlists as $wishlist)
                    <li class="list-group-item" >
                        <a href="{{action('WishlistController@showWishlist', [$wishlist->id]) }}">{{$wishlist->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
