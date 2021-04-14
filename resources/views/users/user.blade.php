@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2">

            <img src="{{ asset('storage/' . $user->image) }}" alt="No disponible" class="rounded-circle" width="100" height="100" >
        </div>
        <div class="col-10">
            <div>
                <h1>{{$user->name}}</h1>
            </div>
            <div><strong>{{$count}}</strong> Wishlists</div>
            <div><strong>{{$followersC}}</strong> Followers</div>
            <div><strong>{{$followsC}}</strong> Following</div>
            <a class="btn btn-info btn-sm action-follow" href="{{action('UserController@followUser', [$user->id]) }}"><strong>
                Follow
                </strong></a>
        </div>
    </div>
    <div class="row">
        <p>{{ $user->description }}</p>
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
