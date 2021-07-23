
@php
    use App\Helper\MyHelper;
    use App\Models\ProfilModel;
@endphp
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BayarYuk!
        </title>

        <!-- Bootstrap -->
        <link
            href="{{asset('template_dashboard')}}/vendors/bootstrap/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <!-- Font Awesome -->
        <link
            href="{{asset('template_dashboard')}}/vendors/font-awesome/css/font-awesome.min.css"
            rel="stylesheet">
        <!-- NProgress -->
        <link
            href="{{asset('template_dashboard')}}/vendors/nprogress/nprogress.css"
            rel="stylesheet">
        <!-- iCheck -->
        <link
            href="{{asset('template_dashboard')}}/vendors/iCheck/skins/flat/green.css"
            rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link
            href="{{asset('template_dashboard')}}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
            rel="stylesheet">
        <!-- PNotify -->
        <link
            href="{{asset('template_dashboard')}}/vendors/pnotify/dist/pnotify.css"
            rel="stylesheet">
        <link
            href="{{asset('template_dashboard')}}/vendors/pnotify/dist/pnotify.buttons.css"
            rel="stylesheet">
        <link
            href="{{asset('template_dashboard')}}/vendors/pnotify/dist/pnotify.nonblock.css"
            rel="stylesheet">
        <!-- Datatables -->
    
        <link href="{{asset('template_dashboard')}}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('template_dashboard')}}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('template_dashboard')}}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('template_dashboard')}}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('template_dashboard')}}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link
            href="{{asset('template_dashboard')}}/build/css/custom.min.css"
            rel="stylesheet">

        <style>

        @media only screen and (max-width: 600px){
            #datatable_filter label input.form-control.input-sm {
            width: 50%;
            }

            div#datatable_length.dataTables_length {
                display: none;
            }

            div#datatable_info.dataTables_info {
                margin-bottom: 1em;
            }

            #label-error{
                display: none;
            }
        }

            

        </style>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col menu_fixed">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="/home" class="site_title">
                                <i class="fa fa-pencil"></i>
                                <span>BayarYuk!</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img
                                    {{-- @if (!empty($profilUser -> gambar_user))
                                        
                                    src="{{url('gambar/profil/'. $profilUser -> gambar_user)}}"
                                    @else
                                        
                                    src="{{url('gambar/profil/profil_default.jpg')}}"
                                    @endif --}}
                                    src="{{url('gambar/profil/'.ProfilModel::getGambar(Auth::user()->id)->gambar_user)}}"
                                    alt="..."
                                    class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br/>

                        <!-- sidebar menu -->
                        @include('template.sidebar')
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                            <a id="menu_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                        <nav class="nav navbar-nav">
                            <ul class=" navbar-right">
                                
                                <li class="nav-item" style="padding-left: 15px;">
                                    <a
                                        href="javascript:;"
                                        
                                        class="user-profile"
                                        aria-haspopup="true"
                                        
                                        
                                        aria-expanded="false">
                                        <img 
                                        {{-- @if (!empty($profilUser -> gambar_user))
                                        
                                        src="{{url('gambar/profil/'. $profilUser -> gambar_user)}}"
                                        @else
                                            
                                        src="{{url('gambar/profil/profil_default.jpg')}}"
                                        @endif --}}
                                        src="{{url('gambar/profil/'.ProfilModel::getGambar(Auth::user()->id)->gambar_user)}}"
                                        alt="">{{ Auth::user()->name }}
                                    </a>
                                    
                                </li>
                                
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                {{-- Page content --}}
                @yield('content')
                {{-- end Page Content --}}

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        ©2021 All Rights Reserved. Made with <i class="fa fa-heart red"></i> by <a href="#">Millenio</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul
                class="list-unstyled notifications clearfix"
                data-tabbed_notifications="notif-group"></ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
        @yield('basic-script')

        <!-- jQuery -->
        <script src="{{asset('template_dashboard')}}/vendors/jquery/dist/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <script
            src="{{asset('template_dashboard')}}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            
        <!-- FastClick -->
        <script
            src="{{asset('template_dashboard')}}/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="{{asset('template_dashboard')}}/vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script
            src="{{asset('template_dashboard')}}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="{{asset('template_dashboard')}}/vendors/iCheck/icheck.min.js"></script>
        <!-- PNotify -->
        <script src="{{asset('template_dashboard')}}/vendors/pnotify/dist/pnotify.js"></script>
        <script
            src="{{asset('template_dashboard')}}/vendors/pnotify/dist/pnotify.buttons.js"></script>
        <script
            src="{{asset('template_dashboard')}}/vendors/pnotify/dist/pnotify.nonblock.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{asset('template_dashboard')}}/vendors/moment/min/moment.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="{{asset('template_dashboard')}}/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="{{asset('template_dashboard')}}/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="{{asset('template_dashboard')}}/vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="{{asset('template_dashboard')}}/vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="{{asset('template_dashboard')}}/vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="{{asset('template_dashboard')}}/vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="{{asset('template_dashboard')}}/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="{{asset('template_dashboard')}}/vendors/starrr/dist/starrr.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{asset('template_dashboard')}}/build/js/custom.min.js"></script>
        <!-- Datatables -->
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/jszip/dist/jszip.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="{{asset('template_dashboard')}}/vendors/pdfmake/build/vfs_fonts.js"></script>
        @yield('new-script')
    </body>
</html>


{{-- {{ dd(  ProfilModel::getGambar(Auth::user()->id)->gambar_user) }} --}}