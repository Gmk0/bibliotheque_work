@extends('layouts.user')

@section('style')

<style>

</style>
@endsection
@section('content')


<header class="masthead" style="background-image: url('../images/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Bienvenue </h1>
                    <span class="subheading">Tout vos Travaux de fin cycle disponible Partout Ou vous etes</span>
                </div>
            </div>
        </div>
    </div>
</header>

{{--<section class="mb-3">

    <div class="rounded mb-3">
        <!-- Carousel wrapper -->
        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <!-- Inner -->
            <div class="carousel-inner w-70" style="">
                <!-- Single item -->
                <div class="carousel-item active">
                    <img src="{{url('images/bg.PNG')}}" height="550px" class="d-block w-100"
                        alt="Sunset Over the City" />
                    <div class="carousel-caption ">
                        <div class="row border bg-carousel rounded-pill p-3 m-5 ">
                            <h5 class="mb-3">Tout Vos Travaux dans</h5>
                            <p>Your work in same web</p>
                        </div>

                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <img src="{{('images/bg2.PNG')}}" height="550px" class="d-block w-100" alt="Canyon at Nigh" />
                    <div class="carousel-caption d-none d-md-block">
                        <div class="row border bg-carousel-2 rounded-pill p-3 m-5 ">
                            <h5>Tout Vos Travaux dans</h5>
                            <p>Your work in same web</p>
                        </div>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <img src="{{('images/bg.PNG')}}" height="550px" class="d-block w-100" alt="" />
                    <div class="carousel-caption ">
                        <div class="row border bg-carousel-3 p-sm-2  rounded-pill  p-md-3 m-md-5 ">
                            <h5 class="mb-md-3">Tout Vos Travaux dans</h5>
                            <p class="mb-md-3">Inscrivez vous pour voir access a tout les contenus de la plateforme</p>

                            <div>
                                <a href="" class="btn btn-primary">Inscription</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBasicExample"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBasicExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel wrapper -->
    </div>

</section>--}}

<section id="domaine" class="mb-3 vh-80">


    <div class="container mb-5">
        <div class="my-5 text-center">
            <h4>DOMAINES</h4>
        </div>
        <div class="row mt-5">
            <div class="splide mb-3">
                <div class="splide__track">
                    <div class="splide__list">
                        @foreach ($Domaine as $domaine)
                        <div class="col-sm-4 splide__slide m-2">

                            <div class="card cards cards-has-bg text-white " style="background-image: url('../storage/domaines/{{$domaine->image}}');
                        border-radius:15px !important;
                        min-height:250px;">

                                <div class="card-img-overlay  text-center">
                                    <div class="bg-card rounded ">
                                        <h4 class="card-title  p-1 ">{{$domaine->intitule}}</h4>
                                        <p class="card-text mb-2 p-2 ">{{$domaine->description}}</p>
                                        <p class="card-text font-weight-bold mb-5 p-1 rounded ">
                                            {{count($domaine->works)}} elements
                                        </p>
                                    </div>

                                </div>

                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="col-xs-1">
                    <a href="{{route('consultation')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-down"></i>
                        Voir Plus</a>
                </div>

            </div>
        </div>
    </div>


    <script>
        var splide = new Splide('.splide', {
           type:"loop",
           
           perPage:3,
           
           breakpoints:{
            1024:{
                perPage:3,
            },
            992:{
                perPage:2,
            },
            790:{
                perPage:1,
            },
           },
           
          
            
            rewind: true,
            focus:'center',
            updateOnMove:true,
           
        });

        
        splide.mount();
    </script>
</section>


<section class=" mb-5">


    <div class="container">
        <div class="my-5">
            <h4>Dernieres Publication</h4>
        </div>
        <div class="row">

            @foreach($works as $work)
            <div class="col-md-6 mb-3">
                <div class="card text-center shadow" style="border-radius: 15px !important">
                    <div class="card-header">{{$work->categorie}} </div>
                    <div class="card-body">
                        <a class="text-decoration-none text-muted" href="">
                            <h5 class="card-title">{{$work->sujet}}</h5>
                        </a>
                        <p class="card-text">{{$work->domaine->intitule}}</p>

                    </div>
                    <div class="card-footer text-muted">{{$work->created_at->diffForHumans()}}</div>
                </div>
            </div>
            @endforeach




        </div>
        <div class="d-flex justify-content-center">
            <div class="col-xs-1">
                <a href="{{route('consultation')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-down"></i> Voir
                    Plus</a>
            </div>

        </div>
    </div>

</section>







@endsection
@push('script')

<script>
    var current_width=$(window).width();

   
  
    $(window).scroll(function() { 

    
        let top = $("#domaine").offset().top;
        if ($(document).scrollTop() >= top) {
        $('nav').addClass('bg-white',2000);
        $('nav').addClass('shadow',2000);
        $('nav').addClass('navbar-light',2000);
        $('nav').removeClass('navbar-dark',2000);
        $('#brand').removeClass('text-white',2000);
        $('#userName').removeClass('text-white').addClass('text-dark');
        $('#brand').addClass('text-dark',2000);
       
        } else {
        $('nav').removeClass('bg-white',2000);
        $('nav').removeClass('shadow',2000);
        $('nav').removeClass('navbar-light',2000);
        $('nav').addClass('navbar-dark',2000);
        if(current_width > 768){
            $('#brand').addClass('text-white');
            $('#userName').addClass('text-white');

        }
        
   
        
        }

        
        });
    
        
       


   
</script>

@endpush