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
a{
    color:black;
}
a:hover{
    color:#517664;
    text-decoration: none;
}
</style>

<div class="container">
    <div class="card p-md-5">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-xl-2">
                <div class="row justify-content-center">
                    <!--img src="{{ asset('img/profile.jpg') }}" alt="No disponible" class="img-fluid rounded-circle d-block d-xl-none" width="100" height="100" -->
                    <img src="{{ asset('img/users/' . $user->image) }}" alt="No disponible" class="img-fluid rounded-circle d-block d-xl-none" width="200" height="200">
                </div>
                <!--img src="{{ asset('img/profile.jpg') }}" alt="No disponible" class="img-fluid rounded-circle d-none d-xl-block" width="100" height="100" -->
                <img src="{{ asset('img/users/' . $user->image) }}" alt="No disponible" class="img-fluid rounded-circle d-none d-xl-block" width="200" height="200">
            </div>
            <div class="col-12 d-block d-xl-none">
                <h1 class="text-center">{{$user->name}}</h1>
                <p class="text-center">
                    <strong>{{$count}}</strong> Wishlists <br> 
                    
                    <strong>{{$followersC}}</strong>
                    <a href="{{action('UserController@showFollowers', [$user->id])}}"> followers</a><br>
                    
                    <strong>{{$followsC}}</strong>
                    <a href="{{action('UserController@showFollowing', [$user->id])}}"> following</a>
                </p>
            </div>
            <div class="col-10 d-none d-xl-block">
                <h1>{{$user->name}}</h1>
                <p>
                    <strong>{{$count}}</strong> Wishlists <br> 
                    <strong>{{$followersC}}</strong>
                    <a href="{{action('UserController@showFollowers', [$user->id])}}"> followers</a><br>
                    <strong>{{$followsC}}</strong>
                    <a href="{{action('UserController@showFollowing', [$user->id])}}"> following</a>
                </p>
                @if($myUser)
                    <a class="btn btn-info btn-sm action-follow" href="{{action('UserController@formUpdate')}}">
                        <strong> Settings </strong>
                    </a>
                @elseif($followed)
                    <form action="{{action('UserController@unfollowUser', [$user->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <button class="btn btn-warning btn-sm action-follow">Unfollow</button>
                @else
                    <form action="{{action('UserController@followUser', [$user->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <button class="btn btn-info btn-sm action-unfollow">Follow</button>
                @endif
            </div>
        </div>
        <div class="row">
            <p>{{ $user->description }}</p>
        </div>
        <div class="row" style="height: 1rem">
        </div>
        <hr>
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
                        @if(!($wishlist->private) || $myUser)
                        <li class="list-group-item" style="padding:.75rem 0 !important;">
                        <div class="container">
                            <div class="row">
                                <div class="col-8">
                                    <a class="wishlist-list-item d-inline-block mr-4" href="{{action('WishlistController@showWishlist', [$wishlist->id]) }}">
                                        <h5>{{$wishlist->name}}</h5>
                                    </a>
                                    @if($myUser)
                                        @if($wishlist->private)
                                        <span class="badge badge-danger d-inline-block">Private</span>
                                        @else
                                        <span class="badge badge-secondary d-inline-block">Public</span>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="row justify-content-end">
                                        <small class="text-muted m-1">{{$wishlist->products->count()}} Products</small>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

