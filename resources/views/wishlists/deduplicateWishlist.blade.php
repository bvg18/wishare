@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{action('WishlistController@editWishlist')}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
            <div class="col-8 offset2">

                <div class="row">
                    <h1>Duduplicate Wishlist</h1>
                </div>

                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('img/products/' . $product->image) }}" alt="No disponible" width="200" height="200">
                        </td>
                        <td>
                        {{$product->name}}
                        <td>
                            {{$product->description}}
                        </td>
                        <td>
                            {{$product->category->name}}
                        </td>
                        <td>
                            <a href="{{$product->url}}" target="_blank">Ver</a>
                        </td>
                        <td>
                            @if (Auth::user()->id==$wishlist->users_id)
                                <form action="{{action('ProductController@deleteProductOfWishList', [$wishlist->id, $product->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            @else
                                <a class="btn btn-info" href="{{action('ProductController@formCopyProduct', [$product->id]) }}">Add to my wishlist</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
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