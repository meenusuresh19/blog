<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <title>Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('resources/img/logo.png') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('resources/assets/admin/css/bootstrap.min.css') }}"  rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('resources/assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('resources/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/assets/admin/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('resources/assets/libs/admin/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />     
        <!-- App Css-->
        
        <link href="{{ asset('resources/assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('resources/assets/admin/css/sweetalert2.min.css') }}"rel="stylesheet" type="text/css" />
        
    </head>
    <body data-topbar="dark">
        <!-- Begin page -->
        <div id="layout-wrapper">
        
         <!-- ========== Topbar Start ========== -->
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">

                        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('resources/img/logo.png') }}" alt="logo-sm-light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('resources/img/logo.png') }}" alt="logo-light" height="60">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-search-line"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            
                            <form class="p-3">
                                <div class="mb-3 m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block user-dropdown">
                        
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                                <!-- alt="Header Avatar"> -->
                            <span class="d-none d-xl-inline-block ms-1"><?php $user = auth()->user(); echo $user->name;?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </header>
        <!-- end topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>

                            <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>

                            <a href="{{ route('admin.blog.index') }}" class="waves-effect">
                                <i class="ri-book-open-fill"></i>
                                <span>Blog</span>
                            </a>
                        </li>
                        
                    </ul> 
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        @yield('content')
        </div>
        <!-- =====Footer === --->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Blog
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->
    <!-- JAVASCRIPT -->
        <script src="{{ asset('resources/assets/admin/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/node-waves/waves.min.js') }}"></script>
        <!-- Plugins js -->
        <script src="{{ asset('resources/assets/admin/libs/dropzone/min/dropzone.min.js') }}"></script>

        <script src="{{ asset('resources/assets/admin/js/pages/sweetalert2.min.js') }}"></script>

    <!-- Required datatable js -->
        <script src="{{ asset('resources/assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

        <script src="{{ asset('resources/assets/admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        
    <!-- Responsive examples -->
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
        <script src="{{ asset('resources/assets/admin/js/pages/datatables.init.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/js/app.js') }}"></script>


        <script src="{{ asset('resources/assets/admin/libs/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/js/pages/form-validation.init.js') }}"></script>

        <script src="{{ asset('resources/assets/admin/js/pages/form-editor.init.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/tinymce/tinymce.min.js') }}"></script>
         <!-- apexcharts -->
         <script src="{{ asset('resources/assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('resources/assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <script src="{{ asset('resources/assets/admin/js/pages/dashboard.init.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        @yield('script')
    </body>
</html>