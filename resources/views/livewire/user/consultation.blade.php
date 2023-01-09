<div class="min-h-screen mx-6 md:mx-12">

    <div class="pt-24 px-6 lg:px-12">

        <div class="pt-24  mx-2 lg:max-12 ">
            <form wire:submit.prevent='searchiTem'>
                <div class="flex ">
                    <label for="search-dropdown"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
                        Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 "
                        type="button">{{$domainesName }}<svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" wire:click="clearD()"
                                    class=" text-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">all
                                    Domaine
                                </button>
                            </li>
                            @foreach ($allDomaine as $item)
                            <li>
                                <button type="button" wire:click="domaines({{$item->id}},`{{$item->intitule}}`)"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$item->intitule}}</button>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-input" wire:model.defer="searchs"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Rechercher un travail" required onchange="clearsearch()">
                        <button type="submit" id="searchButtton"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>


        </div>
        <div>
            <div class="lg:mx-24 md:mx-12 sm:mx-12">
                <div class="flex items-center justify-between  mt-5">
                    <div>
                        @empty(!$searchs)
                        <h5 class="text-gray-700 text-md lg:text-xl font-bold"> Resultat for : "{{$searchs}}"</h5>
                        @endempty
                        @empty(!$categorie)
                        <h5 class="text-gray-700 text-md lg:text-xl font-bold"> Categorie: "{{$categorie}}"</h5>
                        @endempty
                        @empty(!$domaine)
                        <h5 class="text-gray-700 text-md lg:text-xl font-bold"> Domaine: "{{$domainesName}}"</h5>
                        @endempty

                        <h2 class="text-gray-700 text-md lg:text-xl font-bold">Resultat : {{count($count)}} </h2>
                    </div>
                    <div class="flex justify-beetween md:p-6 lg:px-12 ">
                        <div class="px-4 lg:px-6">

                            <select id="countries" wire:model.debounce.800ms='categorie'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 lg:px-12 p-2.5 mx-2  ">
                                <option value="">Categorie</option>
                                <option value="THESE">THESE</option>
                                <option value="MEMOIRE">MEMOIRE</option>
                                <option value="TFC"> TFC</option>
                            </select>

                        </div>
                        <div class="px-4">

                            <select id="countries" wire:model.debounce.800ms='sort'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 px-4 ">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>

                        </div>


                    </div>

                </div>
            </div>

            <div class="lg:mx-26 md:mx-13 mt-5 ">
                @forelse ($works as $travail)

                <div class="max-w-2xl mb-4 px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800"
                    style="cursor: auto;">
                    <div class="flex items-center justify-between">
                        <span
                            class="text-sm font-light text-gray-600 dark:text-gray-400">{{$travail->created_at->diffForHumans()}}</span>
                        <a
                            class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-300 rounded cursor-pointer hover:bg-gray-500">{{$travail->categorie}}</a>
                    </div>
                    <div class="mt-2">
                        <a href="{{route('works_view',[$travail->id])}}"
                            class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">{{$travail->sujet}}</a>
                        <p class="mt-2 text-gray-700 "></p>
                        <a
                            class="mt-2 text-gray-700 hover:underline hover:text-gray-600">{{$travail->domaine->intitule}}</a>
                        <p class="mt-2 text-gray-700 ">{{$travail->etudiant}}</p>
                        <p class="mt-2 text-gray-700 ">{{$travail->annee_etudes}}</p>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="#" class="text-blue-600 font-semibold dark:text-blue-400 hover:underline">Consulter<i
                                class="fas fa-arrow-right"></i></a>
                        <div class="flex items-center">


                            <span class="border-2 rounded-lg text-gray-600 text-sm px-2 py-2">500k

                                <i class="mr-2 fas fa-eye"></i></span>

                        </div>
                    </div>
                </div>
                @empty
                <div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800"
                    style="cursor: auto;">
                    <div class="flex items-center justify-between">


                    </div>
                    <div class="mt-2">
                        <a href="https://stackdiary.com/"
                            class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">
                            Element not found for {{$searchs}}
                    </div>
                    <div class="flex items-center justify-between mt-4">

                        <div class="flex items-center">


                        </div>
                    </div>
                </div>
                @endforelse

                <div class="mx-12 mt-4 mb-3">
                    {{$works->Links()}}
                </div>
            </div>
        </div>



    </div>
</div>

{{--<div class="container mt-6">
    <div class="row mt-5  min-vh-100">

        <div class="container-fluid">
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h6>FILTRES</h6>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <div class=" mb-3">
                        <div class="">
                            <label for="" class="form-label">Dommaine</label>
                            <select class="form-control" name="" id="faculte" wire:model.defer="faculte">
                                <option value="">Faculte</option>
                                <option value="ECONOMIE">ECONOMIE</option>
                                <option value="SCIENCES POLITIQUE">SCIENCES POLITIQUE</option>
                                <option value="COMMUNICATION SOCIAL">COMMUNICATION SOCIAL</option>
                                <option value="THEOLOGIE">THEOLOGIE</option>
                                <option value="SCIENCES INFORMATIQUE">SCIENCES INFORMATIQUE</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="" class="form-label">Categore</label>
                            <select class="form-control " name="" id="categorie" wire:model.defer="categorie"
                                onchange="changeCategorie('categorie','categorie')">
                                <option value="">Categorie</option>
                                <option value="THESE">THESE</option>
                                <option value="MEMOIRE">MEMOIRE</option>
                                <option value="TFC"> TFC</option>

                            </select>
                        </div>
                        <div class="">
                            <label for="" class="form-label">Sort</label>
                            <select class="form-control " name="" id="" wire:model.debounce.800ms="order">
                                <option selected>Select one</option>
                                <option value="asc">ASC</option>
                                <option value="desc">DESC</option>

                            </select>

                        </div>
                        <div class="">
                            <label for="" class="form-label">Order By</label>
                            <select class="form-control " name="" id="" wire:model.debounce.800ms="name"
                                onchange="change('')">
                                <option selected>Select one</option>
                                <option value="sujet">SUJET</option>
                                <option value="created_at">ANNEE ETUDES</option>

                            </select>
                        </div>
                        <div class="">
                            <label for="" class="form-label">PAGINATE</label>
                            <select class="form-control " name="" id="" wire:model.debounce.800ms="sort">
                                <option selected>Select one</option>
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>

                        </div>
                    </div>
                    <button id="submit" class="btn btn-outline-primary">Submit</button>
                    <button id="submit" class="btn btn-outline-warning" wire:click="clearFiltre()">Clear
                        Filtres</button>
                </div>
            </div>

        </div>

        <div class="row justify-content-center h-sm-100 m-1">



            <form wire:submit.prevent='searchiTem' class="col-md-10 mb-4">



                <div class="input-group">
                    <button class="btn btn-outline-warning dropdown-toggle filtre" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                        aria-controls="offcanvasScrolling" id="filtre">FILTRES</button>

                    <input id="search-input" type="search" class="form-control shadow-none form-control-lg"
                        wire:model.lazy="searchs" aria-label="Text input with 2 dropdown buttons">

                    <button id="search-button" type="button" class="btn btn-primary rounded-75">
                        <i class="fas fa-search"></i>Search
                    </button>
                </div>
            </form>


            <div class="mb-3 row justify-content-center">


                <div wire:loading class="justify-content-center align-items-center col-md-4">
                    <div class=" d-flex justify-content-center align-items-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>



            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10 mb-3">
                    <div class="row justify-content-center">
                        @empty(!$searchs)
                        <h5 class="text-gray-700 text-xl font-bold"> Resultat for : "{{$searchs}}"</h5>
                        @endempty
                        @empty(!$categorie)
                        <h5 class="text-gray-700 text-xl font-bold"> Categorie: "{{$categorie}}"</h5>
                        @endempty
                        @empty(!$faculte)
                        <h5 class="text-gray-700 text-xl font-bold"> Domaine: "{{$faculte}}"</h5>
                        @endempty
                    </div>



                </div>


                <div class="col-lg-10 mb-3">
                    <h5 class=" float-start text-gray-500">RESULTAT : {{count($count)}}</h5>
                    <div class="float-end">
                        <select class="form-control " name="" id="" wire:model.debounce.800ms="sort">
                            <option value="5">Select one</option>
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
                @forelse ($works as $travail)

                <div class="card shadow col-lg-10 mb-3">

                    <div class="card-body">
                        <div class="float-end d-none d-md-block">{{$travail->created_at->diffForHumans()}}</div>
                        <h3 class="card-title"><a class="text-decoration-none text-muted"
                                wire:click="viewCount({{ $travail->id }})"
                                href="#"><strong>{{$travail->sujet}}</strong></a></h3>
                        <p class="card-text">Categorie : <a class="text-muted text-decoration-none" href="#"
                                wire:click="searchiTem('{{$travail->categorie}}')">{{$travail->categorie}}</a></p>
                        <p class="card-text"> Domaine : <a href=""
                                class="text-muted  text-decoration-none">{{$travail->faculte}}</a></p>
                        <p class="card-text"> Par l'Etudiant : {{$travail->etudiant}}</p>

                    </div>
                    <div class="card-footer bg-white text-muted">
                        <a href="{{route('works_view',[$travail->id])}}" class="btn btn-outline-primary">Consulter</a>
                        <div class="float-end p-1 border border-secondary rounded-pill "><i class="fas fa-eye"></i>
                            {{$travail->viewCounter}}</div>
                    </div>
                </div>

                @empty
                <div class="card  col-lg-10 mt-5 m-5 p-5" style="">
                    <div class=" card text-start">

                        <div class="card-body">
                            <h1 class="card-title">Not Found</h1>

                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <footer class="row  py-4 mt-auto">
                {{$works->Links()}}
            </footer>
        </div>
    </div>
</div>--}}




@push('script')
<script>
    const searchButton = document.getElementById('searchButtton');
const searchInput = document.getElementById('search-input');
const buttonFiltre=document.getElementById('submit');
let categorie = document.getElementById('categorie');

const fac= document.getElementById('faculte');
searchButton.addEventListener('click', () => {


  const inputValue = searchInput.value;
  @this.searchs=inputValue;

});


buttonFiltre.addEventListener('click',()=>{
    const faculte = fac.value;
    @this.faculte=faculte;
    @this.categorie=categorie.value;

})
function clearsearch(){
    const inputValue = searchInput.value;
    if (inputValue == "") {
       @this.searchs=inputValue;
    }
  
   
};

function changeCategorie(input){

    const field = document.getElementById(input).value;
    if (field == "") {
        @this.categorie=field;
    } 
}
</script>
@endpush