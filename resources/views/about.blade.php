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
    .btn-verde{
        background-color:#9fd8cb;
        color:white;
    }
    .card-body{
        border:none;
        margin:10px 5px 5px 5px;
    }
    footer{
        background-color:#517664;
    }
</style>



<div id="seccion1" class="mt-n4">
    <div id="texto-hero">
        <div class="row justify-content-center">
            <h1 class="text-center">Crea tus whishlist</h1>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati explicabo minima praesentium. Et ducimus architecto consequatur temporibus, error beatae dolorem inventore soluta nisi exercitationem nostrum facilis? Iste, repellat amet! Harum!</p>
            <a href="{{ route('register') }}" class="btn btn-dark">llamada a la accion</a>
        </div>
    </div>
</div>

<div id="seccion2" class="container">
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
<div class="container">
    <div id="seccion3" class=" my-5 py-5 shadow">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    <img class="img-fluid" src="/img/about/undraw_Note_list_re_r4u9.png" alt="">
                </div>
                <div class="col-12 col-lg-8">
                    <h2>titulo 1</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati autem velit earum ullam vitae nisi? Tenetur, numquam qui eos tempore velit delectus unde nostrum est ducimus, laudantium repudiandae facilis. A!</p>
                    <a href="{{ route('register') }}" class="btn btn-block btn-verde mt-1 d-block d-lg-none">Llamada a la accion</a>
                    <a href="{{ route('register') }}" class="btn btn-verde mt-1 d-none d-lg-inline-flex">Llamada a la accion</a>
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
                    <h4 class="text-center text-dark">¿Pregunta 1?</h4>
                </a>
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
                <a data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2" class="card shadow p-3 answer mb-4">
                    <h4 class="text-center text-dark">¿Pregunta 2?</h4>
                </a>
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
                <a data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3" class="card shadow p-3 answer mb-4">
                    <h4 class="text-center text-dark">¿Pregunta 3?</h4>
                </a>
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
                <a data-toggle="collapse" href="#multiCollapseExample4" role="button" aria-expanded="false" aria-controls="multiCollapseExample4" class="card shadow p-3 answer mb-4">
                    <h4 class="text-center text-dark">¿Pregunta 4?</h4>
                </a>
                <div class="collapse multi-collapse" id="multiCollapseExample4">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
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
                <h3>Titulo de prueba</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias harum quo deleniti quidem illum, veniam maiores error corporis ad voluptatum ducimus doloremque eius quam odio, suscipit incidunt placeat et at.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias harum quo deleniti quidem illum, veniam maiores error corporis ad voluptatum ducimus doloremque eius quam odio, suscipit incidunt placeat et at.
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
          <span class="mr-3">Register for free</span>
          <a href="{{ route('register') }}" type="button" class="btn btn-outline-dark btn-rounded">
            Sign up!
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