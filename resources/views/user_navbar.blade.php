<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Al Zaitoon Trader</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/morris.css">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/timeline.css">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-chat.css">
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns content-left-sidebar chat-application  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">
                            <h5  class="brand-text">Al Zaitoon Trader & Usman&Ali Mobiles</h5>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu"></i></a></li>

                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon feather icon-maximize"></i></a></li>

                    </ul>
                    <ul class="nav navbar-nav float-right">

                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="avatar avatar-online"><img src="https://eu.ui-avatars.com/api/?name={{Auth::user()->name}}&background=random" alt="avatar"><i></i></div><span class="user-name">{{Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a><a class="dropdown-item" href="user-cards.html"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="feather icon-power"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span>General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
                </li>
                <li class=" nav-item @if(\Request::is('user.index')) active @endif"><a href="{{route('user.index')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>

                </li>
                
                <li class=" nav-item"><a href="#"><i class="feather icon-book-open"></i><span class="menu-title" data-i18n="Templates">Inventory</span></a>
                    <ul class="menu-content">
                         <li class="@if (\Request::is('totalinventory')) active @endif"><a class="menu-item"
                                href="/totalinventory" data-i18n="1 columns">Total Inventory</a>
                        </li>
                        <li class="@if (\Request::is('managerecentinventory')) active @endif"><a class="menu-item"
                                href="/managerecentinventory" data-i18n="2 columns">Recent Inventory</a>
                        </li>
                        <li class="@if(\Request::is('manageinventory')) active @endif"><a class="menu-item" href="/manageinventory" data-i18n="3 columns">Manage Inventory</a>
                        </li>
                        <li class="@if(\Request::is('soldinventory')) active @endif"><a class="menu-item" href="/soldinventory" data-i18n="4 columns">Sold Inventory</a>
                        </li>
                        <li class="@if (\Request::is('pendinginventory')) active @endif"><a class="menu-item"
                                href="/pendinginventory" data-i18n="5 columns">Pending Inventory</a>
                        </li>
                        <li class="@if(\Request::is('soldapprovedinventory')) active @endif"><a class="menu-item" href="/soldapprovedinventory" data-i18n="5 columns">Sold Approve Inventory</a>
                        </li>
                          <li class="@if (\Request::is('allinventory')) active @endif"><a class="menu-item"
                                href="/allinventory" data-i18n="6 columns">All Inventory</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-tv"></i><span class="menu-title" data-i18n="Templates">Transfer Inventory</span></a>
                    <ul class="menu-content">
                        <li class="@if(\Request::is('receivedtoday')) active @endif"><a class="menu-item" href="/receivedtoday" data-i18n="1 columns">Received Today</a>
                        </li>
                        <li class="@if(\Request::is('recenttransferedinventory')) active @endif"><a class="menu-item" href="/recenttransferedinventory" data-i18n="2 columns"> Recent Received</a>
                        </li>


                        <li class="@if(\Request::is('transferedinventory')) active @endif"><a class="menu-item" href="/transferedinventory" data-i18n="3 columns">Received Mobiles</a>
                        </li>
                        <li class="@if(\Request::is('transferinventory')) active @endif"><a class="menu-item" href="/transferinventory" data-i18n="4 columns">Transfered Mobiles</a>
                        </li>
                        <li class="@if(\Request::is('soldtransferinventory')) active @endif"><a class="menu-item" href="/soldtransferinventory" data-i18n="5 columns">Sold Mobiles</a>
                        </li>
                         <li class="@if (\Request::is('receivedpendinginventory')) active @endif"><a class="menu-item"
                                href="/receivedpendinginventory" data-i18n="5 columns">Pending Mobiles</a>
                        </li>
                         <li class="@if (\Request::is('soldapprovetransferinventory')) active @endif"><a class="menu-item"
                                href="/soldapprovetransferinventory" data-i18n="6 columns">Sold Approve Mobiles</a>
                        </li>

                    </ul>
                </li>
                 <li class=" nav-item"><a href="#"><i class="feather icon-tv"></i><span class="menu-title"
                            data-i18n="Templates">Restore Inventory</span></a>
                    <ul class="menu-content">
                        <li class="@if (\Request::is('restoremobiles')) active @endif"><a class="menu-item"
                                href="/restoremobiles" data-i18n="1 columns">Restore Mobiles</a>
                        </li>



                    </ul>
                </li>
                 <li class=" nav-item"><a href="#"><i class="feather icon-tv"></i><span class="menu-title"
                            data-i18n="Templates">All Shop's Mobile</span></a>
                    <ul class="menu-content">
                        <li class="@if (\Request::is('allshopmobile')) active @endif"><a class="menu-item"
                                href="/allshopmobile" data-i18n="1 columns">All Mobiles</a>
                        </li>



                    </ul>
                </li>


                <li class=" navigation-header"><span>Other shops</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Components"></i>
                </li>
                @foreach ($userData as $data)
                <li class="nav-item"><a href="app-contacts.html"><i class="feather icon-credit-card"></i><span class="menu-title" data-i18n="Contacts">{{$data['user']->name}}</span></a>
                    <ul class="menu-content">
                        <li class="@if (\Request::is('othertotalinventory')) active @endif"><a class="menu-item"
                                    href="/othertotalinventory/{{ $data['user']->id }}" data-i18n="1 columns">Total Inventory</a>
                            </li>
                        <li class="@if(\Request::is('otherinventory')) active @endif"><a class="menu-item" href="/otherinventory/{{$data['user']->id}}" data-i18n="1 columns">Inventory</a></li>
                        
                        <li class="@if(\Request::is('othersoldinventory')) active @endif"><a class="menu-item" href="/othersoldinventory/{{$data['user']->id}}" data-i18n="2 columns">Sold Inventory</a></li>
                        <li class="@if (\Request::is('otherpendinginventory')) active @endif"><a class="menu-item"
                                    href="/otherpendinginventory/{{ $data['user']->id }}" data-i18n="2 columns">Pending
                                    Inventory</a></li>
                        <li class="@if(\Request::is('othertransferinventory')) active @endif"><a class="menu-item" href="/othertransferinventory/{{$data['user']->id}}" data-i18n="3 columns">Received Inventory</a></li>
                        <li class="@if(\Request::is('othertransfersoldinventory')) active @endif"><a class="menu-item" href="/othertransfersoldinventory/{{$data['user']->id}}" data-i18n="4 columns">Sold Received Inventory</a></li>
                    </ul>
                </li>
            @endforeach

            <li class=" nav-item"><a href="#"><i class="feather icon-tv"></i><span
                                                        class="menu-title" data-i18n="Templates">Add values</span></a>
                                        <ul class="menu-content">
                                                <li class="@if (\Request::is('showcompanies')) active @endif"><a
                                                                class="menu-item" href="/showcompanies"
                                                                data-i18n="1 columns">Companies</a>
                                                </li>
                                                <li class="@if (\Request::is('showgroups')) active @endif"><a
                                                                class="menu-item" href="/showgroups"
                                                                data-i18n="1 columns">Groups</a>
                                                </li>
                                                <li class="@if (\Request::is('showmobilenames')) active @endif"><a
                                                                class="menu-item" href="/showmobilenames"
                                                                data-i18n="1 columns">MobileNames</a>
                                                </li>

                                        </ul>
                                </li>

            </ul>
        </div>
    </div>

    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-dark navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2023 <a class="text-bold-800 grey darken-2" href="https://www.linkedin.com/in/syed-shehryar-46a21a1b3/" target="_blank">Sherry </a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with <i class="feather icon-heart pink"></i></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="../../../app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="../../../app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-chat.js"></script>
    <!-- END: Theme JS-->
    <script src="../../../app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <script src="../../../app-assets/js/scripts/forms/wizard-steps.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
