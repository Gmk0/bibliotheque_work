@section('style')
<style>
    #search-input{
        border-radius: 5px !important;

    }
    #search-button{
        border-top-left-radius: 3% !;
    }
    
</style>
    
@endsection

<div class="container">
    <div class="row  min-vh-100">

        <div class="container-fluid">
            <div   class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h6>FILTRES</h6>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
                            <select class="form-control " name="" id="categorie" wire:model.defer="categorie"  onchange="changeCategorie('categorie','categorie')">
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
                            <select class="form-control " name="" id="" wire:model.debounce.800ms="name" onchange="change('')">
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
                    <button id="submit" class="btn btn-outline-warning" wire:click="clearFiltre()">Clear Filtres</button>
                </div>
            </div>
           
        </div>
        
        <div class="row justify-content-center h-sm-100 m-1">
            
          

            <form wire:submit.prevent='searchiTem' class="col-md-10 mb-4">
                

               
                <div class="input-group">
                    <button class="btn btn-outline-warning dropdown-toggle filtre" type="button"data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                    aria-controls="offcanvasScrolling" id="filtre">FILTRES</button>
                   
                    <input id="search-input" type="search" class="form-control shadow-none form-control-lg" wire:model.lazy="searchs" aria-label="Text input with 2 dropdown buttons">
                   
                    <button id="search-button" type="button" class="btn btn-primary rounded-75">
                        <i class="fas fa-search"></i>Search
                      </button>
                  </div>
            </form>
      
           
            <div class="mb-3 row justify-content-center">
                
               
               <div wire:loading class="justify-content-center align-items-center col-md-4">
                <div  class=" d-flex justify-content-center align-items-center">
                    <div class="spinner-border text-primary"
                        role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                   </div>
               </div>
               

               
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10 mb-3">
                    <div class="row justify-content-center">
                    @empty(!$searchs)  
                    <h5 class="float-start text-gray-400"> Resultat for  : "{{$searchs}}"</h5>
                    @endempty
                    @empty(!$categorie)
                    <h5 class="float-start text-gray-400"> Categorie: "{{$categorie}}"</h5>    
                    @endempty
                    @empty(!$faculte)
                    <h5 class="float-start text-gray-400"> Domaine: "{{$faculte}}"</h5>    
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

                <div class="card shadow col-lg-10">

                    <div class="card-body">
                        <div class="float-right d-none d-md-block">{{$travail->created_at->diffForHumans()}}</div>
                        <h3 class="card-title"><a class="text-decoration-none text-muted" wire:click="viewCount({{ $travail->id }})" href="#"><strong>{{$travail->sujet}}</strong></a></h3>
                        <p class="card-text">Categorie : <a class="text-muted text-decoration-none" href="#" wire:click="searchiTem('{{$travail->categorie}}')">{{$travail->categorie}}</a></p>
                        <p class="card-text"> Domaine : <a href="" class="text-muted  text-decoration-none">{{$travail->faculte}}</a></p>
                        <p class="card-text"> Par l'Etudiant :  {{$travail->etudiant}}</p>
                    
                    </div>
                    <div class="card-footer bg-white text-muted">
                        <button wire:click="viewCount({{ $travail->id }})"
                            class="btn btn-outline-primary">Consulter</button>
                            <div class="float-right p-1 border border-primary rounded-lg "><i class="fas fa-eye"></i> {{$travail->viewCounter}}</div>
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
</div>

@push('script')
    <script>
const searchButton = document.getElementById('search-button');
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
searchInput.addEventListener('change', () => {
    const inputValue = searchInput.value;
    if (inputValue == "") {
        @this.searchs=inputValue;
    }
   
})
function changeCategorie(input){

    const field = document.getElementById(input).value;
    if (field == "") {
        @this.categorie=field;
    } 
}
    </script>
@endpush
