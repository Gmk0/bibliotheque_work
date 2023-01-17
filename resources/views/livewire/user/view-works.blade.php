<div>
  <hr>
  <header class="bg-white shadow">

    <div class="flex flex-row  max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <a class="px-3" href="{{route('consultation')}}"><i class="fas fa-arrow-left"></i></a>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Travail') }}
      </h2>
    </div>
  </header>

  <div class="min-h-screen ">


    <div class="px-4 sm:px-6 lg:px-8 pt-12 mb-6">

      <div class="grid grid-cols md:grid-cols-2  mb-[24px]">
        <div class="flex  justify-start mb-3 md:mb-0 ">
          <div class="justify-content border-2 bg-white rounded-lg w-75  p-2 lg:p-3 py-auto">
            <div class="mb-3">
              <label for="" class="text-gray-600 ">Sujet</label>
              <h5 class="text-gray-600 text-md  font-semibold lg:text-lg">{{$work->sujet}}</h5>
            </div>

            <input type="hidden" value="dcc79b40-d369-4f5c-b880-4de03d103668" id="id" name="">

            <div class="mb-1">
              <label for="" class="text-gray-600 text-muted">Categorie</label>
              <h5 class="text-gray-700 lg:text-lg">{{$work->categorie}}</h5>
            </div>
            <div class="mb-1">
              <label for="" class="text-gray-600 text-muted">Domaine</label>
              <h5 class="text-gray-700 lg:text-lg">{{$work->domaine->intitule}}</h5>
            </div>
            <div class="mb-1">
              <label for="" class="text-gray-600 text-muted">Realiser Par</label>
              <h5 class="text-gray-700 text-md lg:text-lg">{{$work->etudiant}}</h5>
            </div>
            <div class="mb-3">
              <label for="text-gray-600" class="text-gray-600 text-muted">Vue</label>
              <div class="w-25  ">
                <span class="p-1 border-2 text-gray-600 rounded-full">
                  {{$work->viewCounter}} <i class="fas fa-eye"></i>
                </span>

              </div>
            </div>
            <div class="mb-3">
              <label for="text-gray-600" class="text-gray-600 text-muted">Decription</label>
              <textarea class="block shadow border-2 rounded w-full text-gray-600 " name="" id="" cols="15" rows="5">
                  {{$work->description}}
                </textarea>
            </div>
            <div class="mb-1">

              <button
                class="mx-auto gradient lg:mx-0 text-white hover:underline bg-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Download</button>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="w-full" id="viewer" style="height: 600px;">

          </div>
        </div>

      </div>

      <div class="mt-6 rounded-lg container mx-auto">

        <h1 class="w-full my-4 text-2xl font-bold leading-tight text-start text-gray-800">
          Contenu du meme domaine
        </h1>
        <div class="grid lg:grid-cols-2 md:grid-cols-1 gap-8">

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

          </div>
          @endforeach




        </div>
      </div>



    </div>

    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
  </div>
</div>



@push('script')
<script type="text/javascript" src="https://cloudpdf.io/viewer.min.js"></script>
<script>
  const config = { 
    documentId: 'dcc79b40-d369-4f5c-b880-4de03d103668',
    darkMode: true, 
  };
  CloudPDF(config, document.getElementById('viewer')).then((instance) => {
    
  });
</script>

@endpush