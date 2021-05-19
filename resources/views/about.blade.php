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
        background-position: fixed;
    }
    #texto-hero{
        position:absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
    }
    #seccion2{
        margin-top: 5em;
        margin-bottom: 5em;
    }
    #seccion3{
        border-radius:10px;
        margin-bottom: 5em;
    }
    #seccion4{
        margin-top: 7em;
        margin-bottom: 5em;
    }
    #seccion5{
        background-color: #9fd8cb;
        margin-top: 7em;
    }
    .answer{
        transition:all .1s ease;
        border:none;
    }
    .answer:hover{
        background-color: #d6e5e3;
        text-decoration: none;
    }
    
    .card-body{
        border:none;
        margin:10px 5px 5px 5px;
    }
    footer{
        background-color:#517664;
    }
    body{
        background-color: white !important;
    }
</style>



<div id="seccion1" class="mt-n4">
    <div id="texto-hero">
        <div class="row justify-content-center">
            <h1 class="text-center col-12">Crea y comparte tus whishlist</h1>
            <p class="text-center col-12">En wishare podras crear tus listas de productos y compartirlas con tus amigos.</p>
            <a href="{{ route('register') }}" class="btn btn-dark ">Comienza</a>
            
        </div>
    </div>
</div>

<div id="seccion2" class="container">
    <div class="row mb-5">
        <div class="col">
            <h2>Un lugar donde organizar tus compras online</h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-6">
            <p>En wishare podrás organizar tus listas de productos e incluir los enlaces de estos mismos, para no perder los productos que te interesan.</p>
            <p>Podrás crear wishlists públicas y privadas, para que compartirlas con tus seguidores sea más facil aún.</p>
        </div>
        <div class="col-12 col-lg-6">
            <p>Además, podrás acceder a descuentos exclusivos sólo por pertenecer a nuestra comunidad.</p>
            <p>Únete totalmente gratis, y podrás acceder a estas ofertas.</p>
        </div>
    </div>
</div>
<div class="container">
    <div id="seccion3" class=" my-5 py-5 shadow">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    <img class="img-fluid" src="/img/about/undraw_Note_list_re_r4u9.png" alt="">
                </div>
                <div class="col-12 col-lg-8">
                    <h2>Todas tus compras organizadas en un mismo lugar</h2>
                    <p>Podrás organizar tus productos en whishlists y categorías, y guardar los que mas te gusten de otros usuarios.</p>
                    <a href="{{ route('register') }}" class="btn btn-block btn-verde mt-1 d-block d-lg-none">Regístrate Gratis</a>
                    <a href="{{ route('register') }}" class="btn btn-verde mt-1 d-none d-lg-inline-flex">Regístrate Gratis</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="seccion4" class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-5">
                <h3 class="text-center">FAQ's</h3>
            </div>
            <div class="col-12 col-lg-8">
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" class="card shadow p-3 answer mb-4">
                    <h4 class="text-center text-dark">¿Cuántas wishlist podré crear como máximo?</h4>
                </a>
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                        No hay un límite establecido, por lo que podrás crear tantas wishlists y productos como quieras.
                    </div>
                </div>
                <a data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2" class="card shadow p-3 answer mb-4">
                    <h4 class="text-center text-dark">¿Es necesario algún plan premium para acceder a los descuentos?</h4>
                </a>
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                        Rotundamente no. Los descuentos están disponibles para todos los usuarios, estos aparecen en formato anuncio durante el uso de la app.
                    </div>
                </div>
                <a data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3" class="card shadow p-3 answer mb-4">
                    <h4 class="text-center text-dark">¿De qué tiendas ofreceis los descuentos?</h4>
                </a>
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                    <div class="card card-body">
                        Disponemos de una gran cantidad de partners, por lo que la variedad en nuestros descuentos es muy diversa.
                        ¡Regístrate Gratis y descubre a nuestros partners!
                    </div>
                </div>
                <a data-toggle="collapse" href="#multiCollapseExample4" role="button" aria-expanded="false" aria-controls="multiCollapseExample4" class="card shadow p-3 answer mb-4">
                    <h4 class="text-center text-dark">¿Cómo puedo evitar que otros usuarios se enteren de lo que publico en mis wishlists?</h4>
                </a>
                <div class="collapse multi-collapse" id="multiCollapseExample4">
                    <div class="card card-body">
                        Podrás gestionar la visibilidad de tus wishlists a tu antojo, por lo que si quieres que una de tus wishlists sea privada, podrás cambiar su visibilidad instantaneamente.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="seccion5">
    <div class="container">
        <div class="row py-4">
            <div class="col-12 col-lg-6">
                <img src="/img/about/christin-hume-Hcfwew744z4-unsplash.jpg" alt="" class="img-fluid">
                <div class="d-block d-lg-none" style="height:50px;"></div>
            </div>
            <div class="col-12 col-lg-6">
                <h3>Accede instantaneamente a tus productos</h3>
                <p>
                    Añade el enlace de tu tienda de confianza, y guardalo para revisarlo en futuras ocasiones, con esto ahorrarás tiempo y te será mas facil revisar si hay cambios en el precio del producto.
                </p>
                <p>
                    Con el sistema de organizacion de productos de wishare por categorías, podrás acceder a los productos de la forma más rápida.
                </p>
            </div>
        </div>
    </div>
</div>

<section class="">
  <!-- Footer -->
  <footer class="text-center text-dark bg-light">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="mr-3">Regístrate Gratis</span>
          <a href="{{ route('register') }}" type="button" class="btn btn-outline-dark btn-rounded">
            ¡Unirme!
          </a>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-dark" href="/">Wishare</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>

@endsection