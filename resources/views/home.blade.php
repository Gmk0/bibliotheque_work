@extends('layouts.user')

@section('style')
   
@endsection
@section('content')



   
<section class="mb-3">
        
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
                <img src="{{url('images/bg.PNG')}}" height="550px" class="d-block w-100" alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <img src="{{('images/bg2.PNG')}}" height="550px" class="d-block w-100" alt="Canyon at Nigh" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <img src="{{('images/bg.PNG')}}" height="550px" class="d-block w-100" alt="Cliff Above a Stormy Sea" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBasicExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBasicExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->
</div>

</section>

<section class="mb-3 vh-80">
    

    <div class="container mb-5">
        <div class="my-5">
            <h4>DOMAINES</h4>
        </div>
        <div class="row mt-5">
            <div class="splide mb-3">
                <div class="splide__track">
                    <div class="splide__list">
                        @for ($i = 0; $i < 6; $i++)
                        <div class="col-sm-4 splide__slide m-2">
                          
                        <div class="card text-white" style="background-image: url('../images/bg.png');
                        border-radius:15px !important;
                        min-height:250px;">
                         
                          <div class="card-body text-center">
                            <h4 class="card-title">Reseax telecommunication</h4>
                            <p class="card-text mb-5">Description</p>
                            <p class="card-text font-weight-bold mb-5">1000 elements</p>
                          </div>
                         
                        </div>
                        </div>  
                        @endfor
                        
                       
                    </div>
                </div>
            </div>

                <div class="d-flex justify-content-center">
        <div class="col-xs-1">
            <a href="" class="btn btn-primary"><i class="fa-solid fa-arrow-down"></i> Voir Plus</a>
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

                @for ($i = 0; $i < 8; $i++)
                    <div class="col-md-6 mb-3">
                        <div class="card text-center shadow" style="border-radius: 15px !important">
                            <div class="card-header">TFC </div>
                            <div class="card-body">
                              <a class="text-decoration-none text-muted" href=""><h5 class="card-title">Mise en Place d'une Plateforme de consultation de travaux</h5></a>
                              <p class="card-text">Reseaux & telecomunications</p>
  
                            </div>
                            <div class="card-footer text-muted">2 days ago</div>
                          </div>
                    </div>  
                @endfor
        

        

    </div>
    <div class="d-flex justify-content-center">
        <div class="col-xs-1">
            <a href="" class="btn btn-primary"><i class="fa-solid fa-arrow-down"></i> Voir Plus</a>
        </div>
       
    </div>
</div>

</section>
    





    
@endsection