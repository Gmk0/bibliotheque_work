@section('title',' Travaux')
<div>

    <div>

        <div class="ROW">
            <div class="col-md-4">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="">Categorie</label>
                <select class="form-control form-control-sm" name="" id="categorie" wire:model.defer="categorie">
                    <option value="">Categorie</option>
                    <option value="THESE">THESE</option>
                    <option value="MEMOIRE">MEMOIRE</option>
                    <option value="TFC"> TFC</option>

                </select>
            </div>
            <div class="col-md-3">
                <label for="">Faculte</label>
                <select class="form-control form-control-sm " name="" id="categorie"
                    wire:model.debounce.800ms="faculte">
                    <option value="">categorie</option>
                    @foreach ($facultes as $item)
                    <option value="{{$item}}">{{$item}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-3">
                <label for="">Domaines</label>
                <select class="form-control form-control-sm" name="" id="categorie" wire:model.debounce.800ms="domaine">
                    <option value="">--Domaines---</option>
                    @foreach ($domaines as $item)
                    <option value="{{$item->id}}">{{$item->intitule}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-3">
                <label for="">Domaines</label>
                <select class="form-control form-control-sm" name="" id="" wire:model.debounce.800ms="status">
                    <option value="">all</option>
                    <option value="1">active</option>
                    <option value="0">Desactiver</option>

                </select>
            </div>

        </div>

    </div>
    <div x-data="{selection: @entangle('selection').defer, selectAll : false,
                
                toggleAllCheckboxes() {
                    this.selectAll = !this.selectAll
                    this.selection = [];

                    checkboxes = document.querySelectorAll('input[name=id]');
                    [...checkboxes].map((el) => {
                        el.checked = this.selectAll;
                        (this.selectAll) ? this.selection.push(el.value) : this.selection = [];
                    })
                }}" class=" mt-5">



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Travail</h3>

                        <div class="card-tools  d-flex">

                            <div class="input-group input-group-sm col-md-3">

                                <select class="form-control" name="" id="" wire:model.debounce.800ms="sort">

                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                </select>
                            </div>
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search" wire:model.debounce.800ms="search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <input type="checkbox" name="checkbox" class="btn btn-default btn-sm checkbox-toggle"
                                x-on:click="toggleAllCheckboxes()" wire:model="check">
                            <div class="btn-group">
                                <button type="button" x-on:click="$wire.deleteTravaux(selection)"
                                    class="btn btn-default btn-sm button-toggle">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <button x-show="selection.length > 0" x-on:click="$wire.activeMultiples(selection)"
                                    class="btn  btn-sm button-toggle"><span
                                        class="badge badge-pill badge-success ">activer</span></button>
                                <button x-show="selection.length > 0" x-on:click="$wire.desactiveMultiple(selection)"
                                    class="btn button-toggle"><span
                                        class="badge badge-pill badge-warning">disabled</span></button>
                            </div>


                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-sync-alt"></i>
                            </button>

                            <button wire:loading
                                wire:target="activeMultiples,desactiveMultiple,faculte,domaine,categorie,sort"
                                class="btn btn-link" type="button" disabled>
                                <span class="spinner-border spinner-grow-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                            <div class="float-right">

                                {{$travaux->links()}}
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.float-right -->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover  travail-list">
                            <thead>
                                <tr>
                                    <th>select</th>
                                    <th>ID</th>
                                    <th>sujet</th>
                                    <th>Domaine</th>
                                    <th>Categorie</th>
                                    <th>document</th>
                                    <th colspan="2">id_Document</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($travaux as $travail )
                                <tr>
                                    <td><input type="checkbox" name="id" value="{{$travail->id}}" x-model="selection">
                                    </td>
                                    <td>{{$travail->id}}</td>
                                    <td>{{$travail->sujet}}</td>
                                    <td>{{$travail->domaine->intitule}}</td>
                                    <td>{{$travail->categorie}}</td>
                                    <td><a href="{{Storage::disk('s3')->url('travaux/'.$travail->path_document)}}"
                                            class="btn"><span
                                                class="badge badge-pill badge-primary">telecharger</span></a></td>
                                    @if (!empty($travail->id_document))
                                    <td>{{$travail->id_document}}</td>
                                    <td><button wire:click="modifierId({{$travail->id}})" class="btn"><span
                                                class="badge badge-pill badge-warning">Mod</span></button></td>
                                    @else
                                    <td>no disponible</td>
                                    <td><button wire:click="modifierId({{$travail->id}})" class="btn"><span
                                                class="badge badge-pill badge-primary">add</span></button></td>
                                    @endif



                                    <td>
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                                            <input {{($travail->status == 1)? "checked":""}}
                                            wire:change="activeOrDesactive({{$travail->id}})" type="checkbox" value="1"
                                            class="custom-control-input" id="customSwitch3">
                                            <label class="custom-control-label" for="customSwitch3">

                                            </label>
                                        </div>
                                    </td>


                                    <td class="text-center">
                                        <button class="btn btn-link"
                                            wire:click="confirmDeletePromo({{$travail->id}},'{{$travail->intitule}}')"><i
                                                class="fa fa-trash-alt" aria-hidden="true"></i></button>
                                        <a href="{{route('admin.works_view',[$travail->id])}}" class="btn btn-link"><i
                                                class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <h4 class="text-center">not data found</h4>
                                @endforelse


                            </tbody>
                            <tfoot>

                            </tfoot>

                        </table>
                    </div>


                </div>

                <!-- /.card-body -->
                <div class="card-footer p-0">
                    <div class="mailbox-controls">
                        <!-- Check all button -->

                        <div class="float-right">

                            {{$travaux->links()}}
                        </div>
                        <!-- /.btn-group -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>

    <div wire:ignore.self class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Id Document</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addIdDocument">

                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('id') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" disabled class="form-control" autocomplete="name" autofocus
                                    wire:model.defer="worksMod.id">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('id_document / Url') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('worksMod.id_document')
                                    is-invalid @enderror" autocomplete="name" autofocus
                                    wire:model.defer="worksMod.id_document">

                                @error('worksMod.id_document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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






@push('script')
<script>
    window.addEventListener('showModalDocument', event=>{
    $("#modal-lg").modal('show');
  })
    window.addEventListener('hideModalDocument', event=>{
    $("#modal-lg").modal('hide');
    })

</script>
@endpush