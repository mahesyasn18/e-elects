<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Electronics</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/stylefooter.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.min.css")}}">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed dark-mode">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <div class="loader">Loading ...</div>
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <span class="brand-text font-weight-light">E-Electronics</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route("main")}}"
                                class="nav-link {{ request()->is("main") ? "active" : "" }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("allproduct")}}"
                                class="nav-link {{ request()->is("product/all") ? "active" : "" }}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("order")}}"
                                class="nav-link {{ request()->is("ordered") || request()->is("confirmed") || request()->is("packing") || request()->is("sent") ? "active" : "" }}">History</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle">Account</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="{{route("detailprofile")}}" class="dropdown-item">My Account</a></li>
                                <li><a href="{{route("logout")}}" class="dropdown-item">Logout</a></li>
                                <!-- End Level two -->
                            </ul>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->
                </div>
            </div>
        </nav>
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content mb-5 mt-2">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <!-- Footer -->
        <!--Important link source from https://bootsnipp.com/snippets/ooa9M-->
        <div class="pb-0 mb-0 justify-content-center text-light ">
            <footer class="main-footer">
                <div class="row my-5 justify-content-center py-5">
                    <div class="col-11">
                        <div class="row ">
                            <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                                <h3 class="text-muted mb-md-0 mb-5 bold-text">E-Electronics.</h3>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-4 col-12">
                                <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>ADDRESS</b></h6>
                                <p class="mb-1">Jalan Ciwaruga No 01, Kecamatan Parongpog</p>
                                <p>Kabupaten Bandung Barat, 40559</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div
                                class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                                <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i
                                            class="fab fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i
                                            class="fab fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i
                                            class="fab fa-instagram" aria-hidden="true"></i></span> </p>
                                <small class="rights"><span>&#174;</span> E-Electronics All Rights Reserved.</small>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                                <h6 class="mt-55 mt-2 text-muted bold-text"><b>Email</b></h6><small> <span><i
                                            class="fa fa-envelope" aria-hidden="true"></i></span>
                                    eelectronics@gmail.com</small>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                                <h6 class="text-muted bold-text"><b>Phone</b></h6><small><span><i class="fas fa-phone"
                                            aria-hidden="true"></i></span>
                                    0882-2211-2603</small>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


    </div>
    <!-- ./wrapper -->


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("dist/js/adminlte.js")}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset("plugins/select2/js/select2.full.min.js")}}"></script>
    <script src="{{asset("plugins/jquery-mousewheel/jquery.mousewheel.js")}}"></script>
    <script src="{{asset("plugins/raphael/raphael.min.js")}}"></script>
    <script src="{{asset("plugins/jquery-mapael/jquery.mapael.min.js")}}"></script>
    <script src="{{asset("plugins/jquery-mapael/maps/usa_states.min.js")}}"></script>
    <!-- ChartJS -->
    <script src="{{asset("plugins/chart.js/Chart.min.js")}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("dist/js/demo.js")}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset("dist/js/pages/dashboard2.js")}}"></script>
    @stack('js')
</body>

</html>