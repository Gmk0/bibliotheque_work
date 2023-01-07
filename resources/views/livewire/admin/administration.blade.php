@section('title','Administration')
<div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">admins</h3>

                    <div class="card-tools d-flex">
                        <div class="input-group input-group-sm col-md-3">

                            <button class="btn btn-success " data-toggle="modal" data-target="#modal-lg">New</button>
                        </div>

                        <div class="input-group input-group-sm" style="width:300px;">
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
                <div class="card-body table-responsive p-0" style="min-height: 200px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>admin</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>last_activity</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->role}}</td>
                                <td><span class="tag text-success">actif</span></td>
                                @if (empty($admin->last_login_at))
                                <td>no activity</td>
                                @else
                                <td>{{$admin->last_login_at}}</td>
                                @endif

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
                    <form wire:submit.prevent="addUser">
                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control form-control-sm @error('admin.name')
                                    is-invalid @enderror" autocomplete="name" autofocus wire:model.defer="admin.name">

                                @error('admin.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Email') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="email" class="form-control form-control-sm @error('admin.email')
                                                            is-invalid @enderror" autocomplete="name" autofocus
                                    wire:model.defer="admin.email">

                                @error('admin.email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('password') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control form-control-sm @error('admin.password')
                                                                                    is-invalid @enderror"
                                    autocomplete="name" autofocus wire:model.defer="admin.password">

                                @error('admin.password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('role') }}</label>

                            <div class="col-md-12">
                                <select wire:model.defer="admin.role" class="form-control form-control-sm @error('admin.role')
                                                                                    is-invalid @enderror" name=""
                                    id="">
                                    <option selected>--role--</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Admin">Admin</option>
                                </select>

                                @error('admin.role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('mobile') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="tel"
                                    class="form-control form-control-sm @error('admin.mobile')
                                                                                                                is-invalid @enderror"
                                    autocomplete="name" autofocus wire:model.defer="admin.mobile">

                                @error('admin.mobile')
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

    {{-- Be like water. --}}
</div>

@push('script')
<script>
    window.addEventListener('Event', event=>{
    
    $("#modal-lg").modal('hide');
    
    Swal.fire({
    position:'top-end',
    toast: true,
    icon:event.detail.message.type,
    title:event.detail.message.title,
    showConfirmButton:false,
    timer:3000
    });
    });
</script>

@endpush