@extends('layouts.app')

@section('content')

<style>
.wishlist-list-item{
    color: black !important;
    transition:all .1s linear;
}
.wishlist-list-item:hover{
    text-decoration-line: none;
    color: gainsboro !important;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-12 col-xl-2">
            <div class="row justify-content-center">
                <img src="{{ asset('img/profile.jpg') }}" alt="No disponible" class="img-fluid rounded-circle d-block d-xl-none" width="100" height="100" >
            </div>
            <img src="{{ asset('img/profile.jpg') }}" alt="No disponible" class="img-fluid rounded-circle d-none d-xl-block" width="100" height="100" >
        </div>
        <div class="col-12 d-block d-xl-none">
            <h1 class="text-center">{{$user->name}}</h1>
            <p class="text-center">
                <strong>{{$count}}</strong> Wishlists <br> 
                <strong>{{$followersC}}</strong> followers<br>
                <strong>{{$followsC}}</strong> following
            </p>
        </div>
        <div class="col-10 d-none d-xl-block">
            <h1>{{$user->name}}</h1>
            <p>
                <strong>{{$count}}</strong> Wishlists <br> 
                <strong>{{$followersC}}</strong> followers<br>
                <strong>{{$followsC}}</strong> following
            </p>
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
        <div class="col-12">
            <div class="display-4 d-none d-xl-block mb-5">
                Wishlists
            </div>
            <h3 class="d-block d-xl-none mb-3">
                Wishlists
            </h3>
            <ul class="list-group list-group-flush">
                @foreach($wishlists as $wishlist)
                    <li class="list-group-item" style="padding:.75rem 0 !important;">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <a class="wishlist-list-item" href="{{action('WishlistController@showWishlist', [$wishlist->id]) }}">
                                    <h5>{{$wishlist->name}}</h5>
                                </a>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end">
                                <small class="text-muted">11 productos</small>
                                </div>
                            </div>
                        </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

