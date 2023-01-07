<div class="container mb-3">

  <div class="row mt-5 p-3">
    <div class="col-md-6 mb-3">

      <div class="card">
        <div class="card-body">
          <div class="card-text">


          </div>
          <div>
            <form action="">
              <div class="row">
                <h5 class="mb-3">
                  avant de joindre votres fichier
                  Veuillez entrez votre matricule

                </h5>
                <h5>
                  NB: si votre matricule est introuvable rendez vous au decanat de votre faculte
                </h5>
                <div class="mb-3">
                  <label for="" class="form-label">Matricule</label>
                  <input type="text" class="form-control" name="" id="" aria-describedby="textHelpId"
                    placeholder="abc@mail.com">

                </div>
                <div>
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>

    </div>
    <div class="col-md-6">
      <form wire:submit.prevent="save">
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