<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('site_title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    @include('layouts.header')
    
</head>

<body class="materialdesign">
    <div class="wrapper-pro">
        <div class="left-sidebar-pro" >
            <nav id="sidebar" style="background-color: #202845;">
                <div class="sidebar-header" style="background-color: #4b6ce3;color: white;">
                    <a href="#">
                        <img src="img/message/1.jpg" alt="" />
                    </a>
                    <h3>Codex</h3>
                    <p>Admin</p>
                    <strong>Cdx</strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul id="sidebar_menu" class="nav navbar-nav left-sidebar-menu-pro">
                        <li class="nav-item">
                            <a href="#" role="button" aria-expanded="false"
                             class="nav-link">
                                <i class="fa big-icon fa-tachometer"></i> 
                                <span class="mini-dn">Tableau de bord</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" role="button" aria-expanded="false" class="nav-link">
                                <i class="fa big-icon fa-info-circle"></i> 
                                <span class="mini-dn">Information</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fa-folder"></i> <span class="mini-dn">Dossiers</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" role="button" aria-expanded="false" class="nav-link">
                                <i class="fa big-icon fa-exclamation-circle"></i> 
                                <span class="mini-dn">Anomalies</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" role="button" aria-expanded="false" class="nav-link">
                                <i class="fa big-icon fa-users"></i> 
                                <span class="mini-dn">Utilisateurs</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" role="button" aria-expanded="false" class="nav-link">
                                <i class="fa big-icon fa-database"></i> 
                                <span class="mini-dn">Agences</span> 
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Header top area start-->
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#"><img src="img/logo/log.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">

                                {{-- BEFORE HEADER --}}


                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name">Codex admin</span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li><a href="#"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>Mon compte</a>
                                                </li>
                                                </li>
                                                <li><a href="#"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Parametres</a>
                                                </li>
                                                <li>
                                                    <div class="p-2 border-t border-theme-40">
                                                        <a class="adminpro-icon adminpro-locked author-log-ic" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Déconnexion </a>
                                    
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        {{-- <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
												<input type="text" placeholder="Recherche..." class="form-control">
												<a href=""><i class="fa fa-search"></i></a>
											</form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Tableau de bord</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Codex Admin</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li class="nav-item">
                                            <a href="#" role="button" aria-expanded="false"
                                             class="nav-link">
                                                <i class="fa big-icon fa-tachometer"></i> 
                                                <span class="mini-dn">Tableau de bord</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" role="button" aria-expanded="false" class="nav-link">
                                                <i class="fa big-icon fa-info-circle"></i> 
                                                <span class="mini-dn">Information</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fa-folder"></i> <span class="mini-dn">Dossiers</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" role="button" aria-expanded="false" class="nav-link">
                                                <i class="fa big-icon fa-exclamation-circle"></i> 
                                                <span class="mini-dn">Anomalies</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" role="button" aria-expanded="false" class="nav-link">
                                                <i class="fa big-icon fa-users"></i> 
                                                <span class="mini-dn">Utilisateurs</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" role="button" aria-expanded="false" class="nav-link">
                                                <i class="fa big-icon fa-database"></i> 
                                                <span class="mini-dn">Agences</span> 
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 des-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
												<input type="text" placeholder="Recherche..." class="form-control">
												<a href=""><i class="fa fa-search"></i></a>
											</form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Accueil</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Tableau de bord</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>@yield('title')</h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
        </div>
    </div>
    <!-- Footer Start-->
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169; 2020 tout droit reservé. par <a href="https://colorlib.com">Carrement web</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
    
    @include('layouts.footer')

</body>

</html>