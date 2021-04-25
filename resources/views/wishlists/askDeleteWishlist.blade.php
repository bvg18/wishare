@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
            <div class="col-8 offset2">

                <div class="row">
                    <h1>Delete Wishlist</h1>
                </div>
                <form action="{{action('WishlistController@askWishlistChoosePOST', [$deleteID->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <label for="name" >{{$deleteID->name}}</label>
                    <br>
                    <label for="name" >Do you want to copy the products to another wishlist?</label>
                    <br>
                    <div>
                        <select class="form-select" id="choose" name="choose">
                            <option selected VALUE="-1">No, delete all products</option>
                            @foreach($wishlists as $w)
                                <option value="{{$w->id}}">{{$w->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary">Do it</button>
                </form>
            </div>
        </div>

</div>
@endsection
<div >
</div>