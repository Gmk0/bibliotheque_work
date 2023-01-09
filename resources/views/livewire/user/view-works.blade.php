@php
$gradient=""
@endphp
<div class="min-h-screen mx-6">
  <div class="container pt-24">


    <div class="px-6 pt-12 mb-6">

      <div class="grid grid-cols md:grid-cols-2 mt-4">
        <div class="flex  justify-start   ">
          <div class="justify-content border-2 rounded-lg w-75  p-2 lg:p-3 py-auto">
            <div class="mb-3">
              <label for="" class="text-gray-600 ">Sujet</label>
              <h5 class="text-gray-600 text-md  font-semibold lg:text-lg">{{$work->sujet}}</h5>
            </div>

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
            <div class="mb-1">

              <button
                class="mx-auto gradient lg:mx-0 text-white hover:underline bg-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Download</button>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div id="app">
            <iframe src="https://drive.google.com/file/d/1kJJeabYl-NH4nsNV8kLs-qTUYESbUfMx/preview" width="500"
              height="375">
            </iframe>
          </div>
        </div>

      </div>



    </div>

    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
  </div>
</div>

@section('script')
<script type="text/javascript" src="https://cloudpdf.io/viewer.min.js"></script>
<script>
  const config = { 
    documentId: 'dcc79b40-d369-4f5c-b880-4de03d103668',
    darkMode: true, 
  };
  CloudPDF(config, document.getElementById('viewer')).then((instance) => {
    
  });
</script>

@endsection