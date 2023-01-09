@extends('layouts.user')

@section('style')

<style>

</style>
@endsection
@section('content')

<div class="pt-24 text-white">
    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">Que recherche vous?</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
                Bibliotheque A porte de Main
            </h1>
            <p class="leading-normal text-2xl mb-8">
                Trouver ic Tous les Travaux de fin de cycle
            </p>
            <a href="{{route('register')}}"
                class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                s'inscrire
            </a>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 py-6 text-center">
            <img class="w-full md:w-4/5 z-50" src="{{url('images/hero.png')}}" />
        </div>
    </div>
</div>
<div class="relative -mt-12 lg:-mt-24">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path
                    d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                    opacity="0.100000001"></path>
                <path
                    d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                    opacity="0.100000001"></path>
                <path
                    d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                    id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path
                    d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                </path>
            </g>
        </g>
    </svg>
</div>


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

<section id="domaine" class="bg-white border-b py-8">


    <div class="container max-w-5xl mx-auto m-8">
        <h1 class="w-full my-2 text-4xl font-bold leading-tight text-center text-gray-800">
            Dommaines
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="mt-5">
            <div class="container mx-auto mb-4">
                <div class="splide mb-4">
                    <div class="splide__arrows">
                        <button class="bg-gray-900 shadow splide__arrow splide__arrow--prev">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </button>
                        <button class="bg-gray-900 shadow splide__arrow splide__arrow--next">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </button>
                    </div>
                    <div class="splide__track">
                        <div class="splide__list gap-x-4">
                            @foreach ($Domaine as $domaine)
                            <div class="w-full p-4 shadow-xl rounded-lg bg-gray-300 border-2 border-gray-300 card-splide splide__slide lg:max-w-lg "
                                style="background-image: url('../storage/domaines/{{$domaine->image}}');">
                                <div class="space-y-2 bg-gray-600 bg-opacity-75 p-2 rounded">
                                    <h3 class="text-2xl text-white font-semibold">
                                        {{$domaine->intitule}}
                                    </h3>
                                    <p class="text-white mb-3">
                                        {{$domaine->description}}
                                    </p>
                                    <p class="text-gray-200 text-center mb-3">
                                        {{count($domaine->works)}} element
                                    </p>

                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="splide mb-3">
                <div class="splide__track">
                    <div class="splide__list">
                        @foreach ($Domaine as $domaine)
                        <div class="sm:col-4 splide__slide m-2 rounded">

                            <div class="card  text-white rounded-full  " style="background-image: url('../storage/domaines/{{$domaine->image}}');
                        border-radius:15px !important;
                        min-height:250px;">

                                <div class="my-3 text-center">
                                    <div class=" bg-slate-700 rounded-xl mx-auto my-auto ">
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
            </div>--}}

            <div class="mx-auto mt-8 flex justify-center">
                <div class="col-xs-1">
                    <a href="{{route('consultation')}}"
                        class="mx-auto lg:mx-0 hover:underline bg-white  font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out gradient text-white"><i
                            class="fa-solid fa-arrow-down"></i>
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


<section class="bg-white border-b py-8">


    <div class="container max-w-5xl mx-auto m-8 px-3">
        <h1 class="w-full my-2 text-4xl font-bold leading-tight text-center text-gray-800">
            Derniers Publication
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="grid lg:grid-cols-2 md:grid-cols-1 gap-4">

            @foreach($works as $work)
            <div class="max-w-2xl px-8 py-4  bg-white rounded-lg shadow-md ">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-light text-gray-600">
                        {{$work->created_at}}
                    </span>
                    <a href=""
                        class="px-3 py-1 text-sm font-bold  text-gray-100 transition-colors duration-200 transform bg-gray-400 rounded cursor-pointer hover:bg-gray-500">{{$work->categorie}}</a>
                </div>
                <div class="mt-2 mb-2">
                    <a href="{{route('works_view',[$work->id])}}"
                        class="text-2xl font-bold text-gray-700 hover:text-gray-600 hover:underline">{{$work->sujet}}</a>
                    <p class="mt-2 text-gray-600">{{$work->domaine->intitule}}</p>
                    <p class="mt-2 text-gray-600">Par : {{$work->etudiant}}</p>
                </div>
                <div class="flex items-center justify-between">
                    <a href="{{route('works_view',[$work->id])}}" class="text-blue-600 hover:underline">Consulter <i
                            class="fas fa-arrow-right"></i></a>

                </div>
                {{--<div class="block text-center shadow" style="">
                    <div class="text-gray-400 text-lg">{{$work->categorie}} </div>
                    <div class="card-body">
                        <a class="text-decoration-none text-muted" href="">
                            <h5 class="card-title">{{$work->sujet}}</h5>
                        </a>
                        <p class="card-text">{{$work->domaine->intitule}}</p>

                    </div>
                    <div class="card-footer text-muted">{{$work->created_at->diffForHumans()}}</div>
                </div>--}}
            </div>
            @endforeach




        </div>
        <div class="mx-auto mt-8 flex justify-center  ">
            <div class="col-xs-1">
                <a href="{{route('consultation')}}"
                    class="mx-auto lg:mx-0 hover:underline bg-white  font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out gradient text-white"><i
                        class="fa-solid fa-arrow-down"></i>
                    Voir Plus</a>
            </div>

        </div>
    </div>

</section>







@endsection
@push('script')
@auth
<script>
    var scrollpos = window.scrollY;
      var header = document.getElementById("header");
      var navcontent = document.getElementById("nav-content");
      
      var brandname = document.getElementById("brandname");
      var toToggle = document.querySelectorAll(".toggleColour");

      document.addEventListener("scroll", function () {
        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if (scrollpos > 10) {
          header.classList.add("bg-white");
          
          //Use to switch toggleColour colours
          for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-gray-800");
            toToggle[i].classList.remove("text-white");
          }
          header.classList.add("shadow");
          navcontent.classList.remove("bg-gray-100");
          navcontent.classList.add("bg-white");
        } else {
          header.classList.remove("bg-white");
          
          //Use to switch toggleColour colours
          for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-white");
            toToggle[i].classList.remove("text-gray-800");
          }

          header.classList.remove("shadow");
        
        }
      });
</script>
@else
<script>
    var scrollpos = window.scrollY;
      var header = document.getElementById("header");
      var navcontent = document.getElementById("nav-content");
      var navaction = document.getElementById("navAction");
      var brandname = document.getElementById("brandname");
      var toToggle = document.querySelectorAll(".toggleColour");

      document.addEventListener("scroll", function () {
        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if (scrollpos > 10) {
          header.classList.add("bg-white");
          navaction.classList.remove("bg-white");
          navaction.classList.add("gradient");
          navaction.classList.remove("text-gray-800");
          navaction.classList.add("text-white");
          //Use to switch toggleColour colours
          for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-gray-800");
            toToggle[i].classList.remove("text-white");
          }
          header.classList.add("shadow");
          navcontent.classList.remove("bg-gray-100");
          navcontent.classList.add("bg-white");
        } else {
          header.classList.remove("bg-white");
          navaction.classList.remove("gradient");
          navaction.classList.add("bg-white");
          navaction.classList.remove("text-white");
          navaction.classList.add("text-gray-800");
          //Use to switch toggleColour colours
          for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-white");
            toToggle[i].classList.remove("text-gray-800");
          }

          header.classList.remove("shadow");
          navcontent.classList.remove("bg-white");
          navcontent.classList.add("bg-gray-100");
        }
      });
</script>
@endauth





@endpush