@extends('layouts.user')



@section('content')

<section class="container mb-3">

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
                                NB:  si votre matricule est introuvable rendez vous au decanat de votre faculte
                            </h5>
                            <div class="mb-3">
                              <label for="" class="form-label">Matricule</label>
                              <input type="text" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
                             
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
            <form action="">
                <div class="card">

                    <div class="card-header">JOINDRE FICHIER</div>
                <div class="row card-body">


                    <div class="mb-3">
                        <label for="" class="form-label">Titre <span>*</span></label>
                        <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId">
                      </div>
                      <div class="mb-3">
                          <label for="" class="form-label">Categorie <span>*</span></label>
                          <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId">
                        </div>
                      <div class="mb-3 col-md-6">
                          <label for="" class="form-label">Dommaines <span>*</span></label>
                          <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId">
                      </div>
                      <div class="mb-3 col-md-6">
                          <label for="" class="form-label">Faculte <span>*</span></label>
                          <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId">
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="" class="form-label">Annnees-etudes<span>*</span> </label>
                          <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId">
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="" class="form-label">Nombres Page<span>*</span></label>
                          <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Etudiant<span>*</span></label>
                            <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">FILE <span>*</span></label>
                            <input type="file" class="form-control" name="" id="" aria-describedby="emailHelpId">
                            <small>veuillez joindre un fichier en formant pdf </small>
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">description</label>
                                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            <small> </small>
                          </div>
                          <div>
                            <button class="btn btn-primary" type="submit">ENVOYER</button>
                          </div>
      
                </div>
            </div>
            </form>
            
        </div>
    </div>

</section>

@endsection
