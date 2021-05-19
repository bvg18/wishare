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
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="justify-content-between align-items-baseline">
                        <div class="row">
                            <div class="col-12 col-md-6"><h1> {{$wishlist->name}} </h1></div>
                            <div class="col-12 col-md-6">
                                <div class="float-md-right">
                                    <a href="{{action('WishlistController@sortByCategory', [$wishlist->id]) }}"> Sort by Category Id</a>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="container text-muted">
                                {{$wishlist->description}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                            @if ($myList)
                                <a class="mr-1" href="{{action('WishlistController@formEditWishlist', [$wishlist->id]) }}"> Edit </a>
                                <a class="mr-1" href="{{action('WishlistController@deduplicateWishlistForm', [$wishlist->id]) }}"> Deduplicate </a>
                                <a class="mr-1" href="{{action('ProductController@formNewProduct', [$wishlist->id]) }}">Add new product</a>
                                <a class="mr-1" href="{{action('WishlistController@askWishlistChooseGET', [$wishlist->id]) }}">Delete wishlist</a>
                            @else
                                <a class="mr-1" href="{{action('WishlistController@copyWishlistOtherUserGET', [$wishlist->id]) }}"> Copy me</a>
                            @endif
                            </div>
                        </div>
                    </div>
                    

                    <form action="{{action('WishlistController@filterByCategory', [$wishlist->id])}}" method="POST" enctype="multipart/form-data" class="my-3">
                        @csrf 
                        
                            <!--label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Filter') }}</label-->
                            <div class="form-row">
                            <div class="col-8 col-md-4">
                                <!--input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus-->
                        
                                <select class="custom-select" id="category" name="category" type="">
                                <option selected VALUE="-1">All</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category-> id }}"> {{ $category-> name }}</option>
                                    @endforeach
                                </select>
                            
                            </div>
                            
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                            
                                <div class="col-3 col-md-2 ml-3">
                                <button class="btn btn-verde-oscuro">Filter</button>
                                </div>
                            </div>
                    
                        </form>
                    
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
                                @if ($myList)
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
                    </table>
                    <div class="row justify-content-center">
                        {{$products->links()}}
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
