@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{$user->name}}'s Wishlists</hi></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-end align-items-baseline">
                        <a href="{{ action('WishlistController@formNewWishlist') }}">New Wishlist</a>
                    </div>

                    <div>
                    <ul class="list-group list-group-flush">
                    @if (count($wishlists)  < 1)
                        <li class="list-group-item" > Ninguna Wishlist</li>
                    @else
                        @foreach($wishlists as $wishlist)
                            <li class="list-group-item" >
                                <a href="{{action('WishlistController@showWishlist', [$wishlist->id]) }}">{{$wishlist->name}}</a>
                            </li>
                            
                        @endforeach
                        {{$wishlists->links()}}
                    @endif
                    </ul>
                    </div>
                    
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
