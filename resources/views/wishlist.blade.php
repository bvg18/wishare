@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <a href="/product/create">Add new product</a>
                    </div>
                    
                    <table class="table table-striped">
                        <tr>
                            <th>Imagen</th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Descripción
                            </th>
                            <th>
                                URL
                            </th>
                            
                        </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <!--img src="img"$product->image}} alt="Logo"/-->
                                <img src="{{ asset('img/products/' . $product->image) }}" alt="No disponible" width="300" height="31">
                            </td>
                            <td>
                                {{$product->name}}
                            <td>
                                {{$product->description}}
                            </td>
                            <td>
                                <a href="{{$product->url}}">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
