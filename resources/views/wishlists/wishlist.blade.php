@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Wishlist</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-baseline">
                        <h1> {{$wishlist->name}} </h1>
                        <a href="{{action('WishlistController@formEditWishlist', [$wishlist->id]) }}"> edit </a>
                        <a href="{{action('ProductController@formNewProduct', [$wishlist->id]) }}">Add new product</a>
                    </div>
                    <div>
                        {{$wishlist->description}}
                    </div>
                    
                    <table class="table table-striped">
                        <tr>
                            <th>Image</th>
                            <th>Name </th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>URL</th>
                            <th>Action</th> <!-- para el boton de borrar -->
                            
                        </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <!--img src="{{ asset('img/products/' . $product->image) }}" alt="No disponible" width="300" height="31"-->
                                <img src="{{ asset('img/products/' . $product->image) }}" alt="No disponible" width="200" height="200">
                            </td>
                            <td>
                                {{$product->name}}
                            <td>
                                {{$product->description}}
                            </td>
                            <td>
                                @foreach($categories as $category)
                                    @if($category->id == $product->categories_id)
                                        {{$category->name}}
                                        @break
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{$product->url}}" target="_blank">Ver</a>
                            </td>
                            <td>
                                <form action="{{action('ProductController@deleteProductOfWishList', [$wishlist->id, $product->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{$products->links()}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
