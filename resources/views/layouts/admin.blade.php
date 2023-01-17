<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> BIBILIOTHE UCC</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/loader.css">
    @livewireStyles
    <link rel="stylesheet" href="stylefull.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        #content {
            visibility: hidden;
        }
    </style>
    <script>
        window.addEventListener("load", function(){
            document.getElementById("loader_wrapper").style.display ="none";
            document.getElementById("content").style.visibility ="visible";
        })
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <x-navbarAdmin />
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <x-sidebarAdmin />
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div id="loader_wrapper" class="mt-5 text-center">
                <div id="loader" class="loader">
                </div>

            </div>
            <div class="content" id="content">
                <div class="container-fluid">

                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Adminstration</h5>
                <div class="row justify-content-beetwen">
                    <div class="col-12">
                        <img src="" alt="">
                    </div>
                    <div class="col-12">
                        <label class="form-label">{{Auth::user()->name}}</label>
                    </div>
                    <div class="col-12">
                        <label class="form-label">{{Auth::user()->email}}</label>
                    </div>
                    <div class="col-12">
                        <label class="form-label">{{Auth::user()->mobile}}</label>
                    </div>
                    <div class="col-12 mb-3">
                        <a href="" class="btn btn-secondary btn-block">Profile</a>
                    </div>
                    <div class="col-12">
                        <a href="{{route('admin.logout')}}" class="btn btn-primary btn-block">Logout</a>
                    </div>
                </div>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <x-footerAdmin />
        <!-- Main Footer -->

    </div>
    @livewireScripts
    @stack("script")
    <script src="/js/app.js"></script>


</body>

</html>