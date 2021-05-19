@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Delete Wishlist</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{action('WishlistController@askWishlistChoosePOST', [$deleteID->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <h4 class="my-4 text-center" ><strong>{{$deleteID->name}}</strong></h4>
                            <br>
                            <label for="name" >Do you want to copy the products to another wishlist?</label>
                            <br>
                            <div>
                                <select class="custom-select" id="choose" name="choose">
                                    <option selected VALUE="-1">No, delete all products</option>
                                    @foreach($wishlists as $w)
                                        @if($w->id != $deleteID->id)
                                            <option value="{{$w->id}}">{{$w->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button class="btn btn-verde-oscuro">Do it</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
<div >
</div>