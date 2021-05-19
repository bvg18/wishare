@extends('layouts.app')

@section('content')
<style>
    a{
        color:black;
    }
    a:hover{
        color:#517664;
        text-decoration: none;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!--div class="card">
                <div class="card-header">Home</div>

                <div class="card-body"-->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- ¡Welcome to Wishare!
                    <a class="nav-link" href="{{action('WishlistController@listWishlist', [Auth::user()->id] ) }}">My Wishlists</a-->
                    
                    @foreach($prodOrdeded as $productOrder)
                    
                        <div class="card shadow">
                            <div class="card-header bg-white">
                                <div class="d-flex justify-content-between">
                                    
                                    <a href="{{action('UserController@showUser', [$productOrder->wishlist->user->id]) }}">
                                        <!-- No se porque no va <img src="{{ asset('img/products/' . $productOrder->wishlist->user->image) }}" alt="No disponible" class="img-fluid rounded-circle" width="40" height="40">-->
                                        {{$productOrder->wishlist->user->name}}
                                    </a>
                                    
                                    <a href="{{action('WishlistController@showWishlist', [$productOrder->wishlist->id]) }}">{{$productOrder->wishlist->name}}</a>
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{$productOrder->url}}" target="_blank">
                                    <img src="{{ asset('img/products/' . $productOrder->image) }}" class="rounded mx-auto d-block img-fluid" alt="Ver" width="400" height="400">
                                </a>
                                <p>
                                <a href="{{$productOrder->url}}" target="_blank">
                                    <h3><b>{{$productOrder->name}}</b></h3>
                                </a>
                                </p>
                                {{$productOrder->description}}
                                <p>
                                {{$productOrder->category->name}}
                                </p>
                                @if($productOrder->wishlist->user->id != Auth::id())
                                    <a class="btn btn-info" href="{{action('ProductController@formCopyProduct', [$productOrder->id]) }}">Add to my wishlist</a>
                                @endif
                            </div>
                        </div>
                        <p></p>
                        
                    @endforeach

                <!--/div>
            </div-->
        </div>
    </div>
</div>
@endsection
