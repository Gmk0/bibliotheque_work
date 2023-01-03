@section('title','Domaine dexpertise')
<div>

    <div>

        <div class="ROW">
            <div class="col-md-4">
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-lg">
                    Ajouter
                </button>
            </div>
        </div>


    </div>
    <div class=" mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DOMAINE EPXERTISE</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>intitule</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($domaineList as $domaines )
                                <tr>
                                    <td>{{$domaines->id}}</td>
                                    <td>{{$domaines->intitule}}</td>
                                    <td><img src="{{asset('storage/domaines/'.$domaines->image)}}" class="img-thumbnail"
                                            width="50" alt=""></td>
                                    @if($domaines->status ==1)
                                    <td><button wire:click="DesactiveStatus({{$domaines->id}})" class="btn"><span
                                                class="badge badge-pill badge-success">activer</span></button>
                                    </td>
                                    @else
                                    <td> <button wire:click="ActiveStatus({{$domaines->id}})" class="btn"><span
                                                class="badge badge-pill badge-warning">desactiver</span></button>
                                    </td>
                                    @endif

                                    <td class="text-center">
                                        <button class="btn btn-link"
                                            wire:click='confirmDelete({{$domaines->id}},"{{$domaines->intitule}}")'><i
                                                class="fa fa-trash-alt" aria-hidden="true"></i></button>
                                        <button class="btn btn-link" wire:click="goToEdit({{$domaines->id}})"
                                            data-target="#modal-promotion-edit"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <h4 class="text-center">not data found</h4>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">domaine</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="registerDomaines">
                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('domaines') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('" domaines.intitule')
                                    is-invalid @enderror" autocomplete="name" autofocus
                                    wire:model.defer="domaines.intitule">

                                @error('domaines')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="desc" class="col-md-12 col-form-label ">{{ __('description') }}</label>

                            <div class="col-md-12">

                                <textarea name="" id="desc" cols="15" rows="5"
                                    class="form-control @error('domaines.description') is-invalid @enderror" autofocus
                                    wire:model.defer="domaines.description">

                                    </textarea>

                                @error('domaines')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="file" class="col-md-12 col-form-label ">{{ __('image') }}</label>

                            <div class="col-md-12">
                                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror"
                                    wire:model.defer="file">

                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                wire:click="cleanModal()">Close</button>
                            <button type="submit" wire:loading.attr='disabled' class="btn btn-primary">Save</button>
                        </div>


                    </form>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>

@push("script")

<script>
    window.addEventListener('hideModal', event=> {
    
        $("#modal-lg").modal('hide');
        toastr.options = ({
        "closeButton":true,
        "positionClass":"toast-bottom-right",
        });
       
    });

    
 window.addEventListener('showWarningMessage', event=> {
        Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer'
        }).then((result) => {
        if (result.isConfirmed) {
        @this.deleteDomaines(event.detail.message.data.id)
        }
        })
});
</script>
@endpush