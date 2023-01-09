<div class="min-h-screen pt-24">

  @php

  @endphp
  <div class="container grid grid-cols-1 lg:grid-cols-2 p-4 m-2 lg:m-4 px-6">
    <div class="col-md-6 mb-3 mx-3 lg:mx-6">


      <div class="card bg-white rounded p-3">

        <div>

          <form class="p-3">

            <h5 class="text-gray-800 text-xl mb-3">
              Avant de joindre votre fichier
              Veuillez entrez votre matricule

            </h5>
            <h5 class="text-gray-500 text-md">
              NB: si votre matricule est introuvable rendez vous au decanat de votre faculte
            </h5>
            <div class="mb-3">
              <label for="sujet"
                class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white">Matricule</label>
              <input type="text" id="text"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="matricule...">
            </div>
            <div class="mb-3">
              <button type="submit" disabled
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md sm:text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Soumttre</button>
            </div>
            <p class="text-red-600 text-md">Fonctionnalites non disponible</p>
          </form>
        </div>


      </div>

    </div>
    <div class="card shadow p-3 bg-white rounded-lg">

      <h2 class="text-gray-600 p-2 text-center mx-auto">Travail a joindre</h2>

      <hr>

      {{--<form wire:submit.prevent="save">
        <div class="card">

          <div class="card-header">JOINDRE FICHIER</div>
          <div class="row card-body">

            <div class="mb-3">
              <label for="" class="form-label">Titre <span>*</span></label>
              <input type="text" class="form-control @error('work.sujet') is-invalid @enderror" name="" id=""
                aria-describedby="textHelpId" wire:model.defer="work.sujet">
              @error('work.sujet')
              <small id="helpId" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Catgeorie <span>*</span></label>
              <select wire:model.defer="work.categorie"
                class="form-control @error('work.categorie') is-invalid @enderror" name="" id="">
                <option selected>-- categorie---</option>
                <option value="TFC">TFC</option>
                <option value="MEMOIRE">MEMOIRE</option>
                <option value="THESE">THESE</option>
              </select>
              @error('work.categorie')
              <small id="helpId" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3 ">
              <label for="" class="form-label">Dommaines <span>*</span></label>
              <select wire:model.defer="work.domaine" class="form-control @error('work.domaine') is-invalid @enderror"
                name="" id="">

                <option selected>-- Dommaines---</option>
                @foreach ($domaines as $item)
                <option value="{{$item->id}}">{{$item->intitule}}</option>
                @endforeach
                @error('work.domaine')
                <small id="helpId" class="form-text text-danger">{{$message}}</small>
                @enderror
              </select>
            </div>
            <div class="mb-3 ">
              <label for="" class="form-label">Faculte <span>*</span></label>
              <select wire:model.defer="work.faculte" class="form-control @error('work.faculte') is-invalid @enderror"
                name="" id="">
                <option selected>-- faculte---</option>

                <option value="MEDECINE">MEDECINE</option>
                <option value="DROIT">DROIT</option>
                <option value="ECONOMIE">ECONOMIE</option>
                <option value="PHILOSOPHIE">PHILOSOPHIE</option>
                <option value="THEOLOGIE">THEOLOGIE</option>

              </select>
              @error('work.faculte')
              <small id="helpId" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label for="" class="form-label ">Annnees-etudes<span>*</span> </label>
              <input wire:model.defer="work.annee" type="text"
                class="form-control @error('work.annee') is-invalid @enderror" name="" id=""
                aria-describedby="textHelpId">
              @error('work.annee')
              <small id="helpId" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label for="" class="form-label">Nombres Page<span>*</span></label>
              <input wire:model.defer="work.page" type="text"
                class="form-control @error('work.categorie') is-invalid @enderror" name="" id=""
                aria-describedby="textHelpId">
              @error('work.page')
              <small id="helpId" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Etudiant<span>*</span></label>
              <input wire:model.defer="work.etudiant" type="text"
                class="form-control @error('work.etudiant') is-invalid @enderror" name="" id=""
                aria-describedby="textHelpId">
              @error('work.etudiant')
              <small id="helpId" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">FILE <span>*</span></label>
              <input wire:model.defer="file" type="file" class="form-control @error('file') is-invalid @enderror"
                name="" id="" aria-describedby="textHelpId">
              <small>veuillez joindre un fichier en formant pdf </small>
              @error('file')
              <small id="helpId" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">description</label>
              <textarea name="" id="" cols="30" rows="5"
                class="form-control @error('work.desscription') is-invalid @enderror"></textarea>
              <small> </small>
            </div>
            <div>
              <button class="btn btn-primary" wire:loading.attr='disabled' type="submit">ENVOYER</button>
            </div>

          </div>
        </div>
      </form>--}}
      <form wire:submit.prevent="save" class="p-3">
        <div class="mb-3">
          <label for="sujet"
            class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white">Sujet</label>
          <input type="text" id="text" wire:model="work.sujet"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            placeholder="mise en place...">
          @error('work.sujet')
          <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
              class="font-medium">{{$message}}</span>
          </p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password"
            class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white">Categorie</label>
          <select wire:model.defer="work.categorie"
            class="g-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
            name="" id="">
            <option selected>-- categorie---</option>
            <option value="TFC">TFC</option>
            <option value="MEMOIRE">MEMOIRE</option>
            <option value="THESE">THESE</option>
          </select>
          @error('work.categorie')
          <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
              class="font-medium">{{$message}}</span>
          </p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password"
            class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white">Domaine</label>
          <select wire:model.defer="work.domaine"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            name="" id="">

            <option selected>-- Dommaines---</option>
            @foreach ($domaines as $item)
            <option value="{{$item->id}}">{{$item->intitule}}</option>
            @endforeach

          </select>
          @error('work.domaine')
          <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
              class="font-medium">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
          <label for="password"
            class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white">Categorie</label>
          <select wire:model.defer="work.faculte"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            name="" id="">
            <option selected>-- faculte---</option>

            <option value="MEDECINE">MEDECINE</option>
            <option value="DROIT">DROIT</option>
            <option value="ECONOMIE">ECONOMIE</option>
            <option value="PHILOSOPHIE">PHILOSOPHIE</option>
            <option value="THEOLOGIE">THEOLOGIE</option>

          </select>
          @error('work.faculte')
          <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
              class="font-medium">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white">Annee
            etudes</label>
          <input wire:model.defer="work.annee" type="text"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            name="" id="" aria-describedby="textHelpId">
          @error('work.annee')
          <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
              class="font-medium">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label for="page"
            class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white">Pages</label>
          <input wire:model.defer="work.page" type="text"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            name="" id="" aria-describedby="textHelpId">
          @error('work.page')
          <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
              class="font-medium">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white">Nom
            Etudiant</label>
          <input wire:model.defer="work.etudiant" type="text"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            name="" id="" aria-describedby="textHelpId">
          @error('work.etudiant')
          <p class="mt-2 md:text-md text-sm text-red-600 dark:text-red-500"><span
              class="font-medium">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
          <label class="block mb-2 text-md sm:text-sm font-medium text-gray-900 dark:text-white"
            for="user_avatar">Upload
            file</label>
          <input wire:model.defer="file"
            class="block w-full text-md sm:text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="user_avatar_help" id="user_avatar" type="file">
          <div class="mt-1 text-md sm:text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Veillez joindre
            votre travail
            en pdf, docx , doc
          </div>
          <div wire:loading wire:checkout="file">
            <div role="status">
              <svg aria-hidden="true"
                class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                  fill="currentColor" />
                <path
                  d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                  fill="currentFill" />
              </svg>
              <span class="sr-only">Loading...</span>
            </div>
          </div>
          @if (!empty($file))
          <p class="flex items-center text-gray-700">
            <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"></path>
            </svg>
            Fichier enregistrer
          </p>
          @endif

          @error('file')
          <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
              class="font-medium">{{$message}}</span>
            @enderror
        </div>

        <div wire:loading.remove wire:target="save">
          <button type="submit" wire:loading.attr='disabled' wire:target="file"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md sm:text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Soumttre</button>
        </div>

        <div wire:loading wire:target="save">
          <button disabled type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md sm:text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
            <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin"
              viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="#E5E7EB" />
              <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentColor" />
            </svg>
            Soumission
          </button>
        </div>

      </form>

    </div>
  </div>

</div>

@push('script')
<script>
  window.addEventListener('showSuccessMessage', event=> {
    
    Swal.fire({
    position: 'top-end',
    icon:'success',
    toast: true,
    title:"operatione reussie",
    text:event.detail.message,
    showConfirmButton: false,
    timer:6000
    
    });
    
    });
</script>

@endpush