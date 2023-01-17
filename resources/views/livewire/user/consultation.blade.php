<div>
    <hr>
    <header class="bg-white shadow">

        <div class="flex flex-row  max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <a class="px-3" href="{{route('home')}}"><i class="fas fa-arrow-left"></i></a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Consultation') }}
            </h2>
        </div>
    </header>
    <div class="min-h-screen mx-0 md:mx-12">

        <div class="pt-20 px-6 lg:px-12">
            <div>

                <form wire:submit.prevent='searchiTem'>
                    <div class="w-full  shadow p-5 rounded-lg bg-white">
                        <div class="relative">
                            <div class="absolute flex items-center ml-2 h-full">
                                <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z">
                                    </path>
                                </svg>
                            </div>

                            <div class="relative w-full">
                                <input type="search" id="search-input" wire:model.defer="searchs"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg  border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="Rechercher un travail" required onchange="clearsearch()">
                                <button type="submit" id="searchButtton"
                                    class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>

                                </button>

                            </div>

                            {{-- <div class="bg-gray w-full mt-5 hidden md:flex border-2 rounded shadow">
                                <ul class="p-2.5 text-md font-medium">



                                </ul>
                            </div>
                            --}}



                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <p class="font-medium">
                                Filters
                            </p>

                            <button wire:click="clearfilter()" type="button"
                                class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                                Reset Filter
                            </button>
                        </div>

                        <div>
                            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">

                                <select id="countries" wire:model.debounce.800ms='categorie'
                                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                    <option value="">--Categorie--</option>
                                    <option value="THESE">THESE</option>
                                    <option value="MEMOIRE">MEMOIRE</option>
                                    <option value="TFC"> TFC</option>
                                </select>
                                <select
                                    class="px-2 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    name="" id="faculte" wire:model.defer="faculte">
                                    <option value="">--Faculte--</option>
                                    <option value="ECONOMIE">ECONOMIE</option>
                                    <option value="SCIENCES POLITIQUE">SCIENCES POLITIQUE</option>
                                    <option value="COMMUNICATION SOCIAL">COMMUNICATION SOCIAL</option>
                                    <option value="THEOLOGIE">THEOLOGIE</option>
                                    <option value="SCIENCES INFORMATIQUE">SCIENCES INFORMATIQUE</option>
                                </select>
                                <select id="countries" wire:model.debounce.800ms='domaine'
                                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                    <option value="">--domaine--</option>
                                    @foreach ($allDomaine as $item)
                                    <option value="{{$item->intitule}}">{{$item->intitule}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex items-center justify-between  mt-2">
                                <div>
                                    @empty(!$searchs)
                                    <h5 class="text-gray-700 text-md lg:text-xl font-bold"> Resultat for :
                                        "{{$searchs}}"
                                    </h5>
                                    @endempty
                                    @empty(!$categorie)
                                    <h5 class="text-gray-700 text-md lg:text-xl font-bold"> Categorie: "{{$categorie}}"
                                    </h5>
                                    @endempty
                                    @empty(!$domaine)
                                    <h5 class="text-gray-700 text-md lg:text-xl font-bold"> Domaine: "{{$domaine}}"
                                    </h5>
                                    @endempty

                                    <h2 class="text-gray-700 text-md lg:text-xl font-bold">Resultat : {{count($count)}}
                                    </h2>
                                </div>
                                <div>
                                    <div wire:loading class="h-8 bg-white">

                                        <span class="loader"></span>


                                    </div>
                                </div>
                                <div class="flex justify-beetween md:p-6 lg:px-12 ">

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
                    </div>

                </form>
            </div>

            <div>



                <div class="mt-2">
                    @forelse ($works as $travail)

                    <div class=" mb-4 px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800"
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
                            <a href="{{route('works_view',[$travail->id])}}"
                                class="text-blue-600 font-semibold dark:text-blue-400 hover:underline">Consulter<i
                                    class="fas fa-arrow-right"></i></a>
                            <div class="flex items-center">


                                <span class="border-2 rounded-lg text-gray-600 text-sm px-2 py-2">500k

                                    <i class="mr-2 fas fa-eye"></i></span>

                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="w-75 mt-2 px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800"
                        style="cursor: auto;">
                        <div class="flex items-center justify-between">


                        </div>
                        <div class="mt-2">
                            <a href="https://stackdiary.com/"
                                class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">
                                Aucun Resultat pour {{$searchs}}
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
</div>






@push('script')
<script>

</script>
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