@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        <h3>Select Wishlist</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <tr>
                                <td>
                                    <img src="{{ asset('img/products/' . $productToCopy->image) }}" alt="No disponible" width="200" height="200">
                                </td>
                                <td>
                                    <ul style="list-style:none;">
                                        <li><h5 class="mb-3">{{$productToCopy->name}}</h5></li>
                                        <li class="text-muted">{{$productToCopy->description}}</li>
                                        <li><small>Category: <strong>{{$productToCopy->category->name}}</strong></small></li>
                                        <li><a class="btn btn-verde-oscuro mt-2" href="{{$productToCopy->url}}" target="_blank">Ver</a></li>
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
                            <button class="btn btn-verde-oscuro">Copy</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>

</div>
@endsection
<div >
</div>