@extends('layouts.app')

@section('content')
<style>
    html,body,main,#app{
        margin:0;
        padding:0;
        height: 100%;
        width: 100%;
    }
    #seccion1{
        height: 100%;
        width: 100%;
        background: rgb(202,207,214);
background: linear-gradient(90deg, rgba(202,207,214,1) 0%, rgba(214,229,227,1) 27%, rgba(159,216,203,1) 100%);
    }
    #texto-hero{
        position:absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
    }
</style>



<div id="seccion1" class="mt-n4">
    <div id="texto-hero">
        <div class="row justify-content-center">
            <h1 class="text-center">Crea tus whishlist</h1>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati explicabo minima praesentium. Et ducimus architecto consequatur temporibus, error beatae dolorem inventore soluta nisi exercitationem nostrum facilis? Iste, repellat amet! Harum!</p>
            <a href="" class="btn btn-dark">llamada a la accion</a>
        </div>
    </div>
</div>

<div id="seccion2" class="container my-5">
    <div class="row mb-5">
        <div class="col">
            <h2>Titulo de prueba</h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae quam illo accusantium repellat cupiditate doloribus deleniti ut temporibus maxime, nobis odit natus dolorum corrupti nihil maiores voluptatibus, tenetur architecto molestias?</p>
        </div>
        <div class="col-12 col-lg-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae quam illo accusantium repellat cupiditate doloribus deleniti ut temporibus maxime, nobis odit natus dolorum corrupti nihil maiores voluptatibus, tenetur architecto molestias?</p>
        </div>
    </div>
</div>

<div id="seccion3" class="container my-5 shadow">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <h2>titulo 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati autem velit earum ullam vitae nisi? Tenetur, numquam qui eos tempore velit delectus unde nostrum est ducimus, laudantium repudiandae facilis. A!</p>
        </div>
    </div>
</div>

@endsection