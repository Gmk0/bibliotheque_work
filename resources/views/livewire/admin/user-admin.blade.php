@section('title','Utilisateur')
<div class="container">



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 300px;">
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
                <div class="card-body table-responsive p-0" style="height: 400px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>last_activity</th>
                                <th>address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><span class="tag text-success">actif</span></td>
                                @if (empty($user->last_login_at))
                                <td>no activity</td>
                                @else
                                <td>{{$user->last_login_at}}</td>
                                @endif
                                <td>{{$user->last_login_ip_address}}</td>
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

    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>