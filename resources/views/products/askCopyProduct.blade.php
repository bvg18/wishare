@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
            <div class="col-8 offset2">

                <div class="row">
                    <h1>Select Wishlist</h1>
                </div>
                <div class="row">
                    <tr>
                        <td>
                            <img src="{{ asset('img/products/' . $productToCopy->image) }}" alt="No disponible" width="200" height="200">
                        </td>
                        <td>
                            <ul>
                                <li>{{$productToCopy->name}}</li>
                                <li>{{$productToCopy->description}}</li>
                                <li>{{$productToCopy->category->name}}</li>
                                <li><a href="{{$productToCopy->url}}" target="_blank">Ver</a></li>
                            </ul>
                        </td>
                    </tr>
                </div>
                <form action="{{action('ProductController@copyProduct', [$productToCopy->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <br>
                    <label for="name" >Do you want to copy the products to another wishlist?</label>
                    <br>
                    <div>
                        <select class="form-select" id="choose" name="choose">
                            <option selected VALUE="-1">New Wishlist</option>
                            @foreach($userWishlists as $w)
                                    <option value="{{$w->id}}">{{$w->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary">Copy</button>
                </form>
            </div>
        </div>

</div>
@endsection
<div >
</div>