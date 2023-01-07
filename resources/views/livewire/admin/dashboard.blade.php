<div class="container">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">
                        10
                        <small>%</small>
                    </span>
                </div>

            </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Travaux </span>
                    <span class="info-box-number">{{$works_count}}</span>
                </div>

            </div>

        </div>


        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Travaux valider</span>
                    <span class="info-box-number">{{$works_active}}</span>
                </div>

            </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">New Members</span>
                    <span class="info-box-number">{{$new_member}}</span>
                </div>

            </div>

        </div>

    </div>

    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Latest Orders</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="display: block;">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID Travail</th>
                            <th>Sujet</th>
                            <th>Status</th>
                            <th>Etudiant</th>
                            <th>Categorie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($works as $work)
                        <tr>
                            <td><a href="{{route('admin.works_view',[$work->id])}}">{{$work->id}}</a></td>
                            <td>{{$work->sujet}}</td>
                            @if ($work->status==1)
                            <td><span class="badge badge-success">valider</span></td>
                            @else
                            <td><span class="badge badge-warning">non valider</span></td>
                            @endif

                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$work->etudiant}}</div>
                            </td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$work->categorie}}</div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix" style="display: block;">
            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
            <a href="{{route('admin.works')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
        </div>
        <!-- /.card-footer -->
    </div>
</div>