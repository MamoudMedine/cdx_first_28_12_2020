<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Codex | Administration</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    @include('layouts.header')
    
</head>

<body class="materialdesign">
    <div class="wrapper-pro">
        <div class="left-sidebar-pro" >
            @include('layouts.codex_nav')
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
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12"><!-- RECHERCHE-->
                                <form style="margin-top: 15px;width: 800px;" action="" class="form form-inline">
                                     <span style="font-weight: bold;font-size: 20px; color: white;">Agence : {{$get_agence->nom}}</span>
                                     <span style="font-weight: bold;font-size: 20px; color: white;"> 
                                        Mise à jour : 20-11-2020
                                     </span>
                                </form>
                            </div> <!-- FIN RECHERCHE-->
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name">{{Auth::user()->nom_utilisateur}}</span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li>
                                                    <a href="{{route('edit_user_codex')}}"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>Changer le mot de passe</a>
                                                </li>
                                                <li>
                                                    <div class="p-2 border-t border-theme-40">
                                                        <a class="adminpro-icon adminpro-locked author-log-ic" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Déconnexion </a>
                                                    
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
            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row" style="margin-top: 15px;">
                        <!-- CONTENU PRINCIPAL -->
                            <div class="container">
                                    <div class="row">
                                        @if($message = Session::get('success'))
                                            {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> --}}
                                            <div class="alert alert-success">{{ $message }}</div>
                                        @endif
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <h2>Informations globales</h2>
                                            <div class="panel panel-default">
                                                <div style="background-color: white;" class="panel-heading">Informations globales</div>
                                                <div class="panel-body">
                                                    graph global
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mx-auto">
                                            <h2>Informations par agences</h2>
                                            <div class="panel panel-default">
                                                <div style="background-color: white;" class="panel-heading">Informations par agences</div>
                                                <div class="panel-body">
                                                    graph global
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <h2>Informations globales</h2>
                                            <div class="panel panel-default">
                                                <div style="background-color: white;" class="panel-heading">Informations globales</div>
                                                <div class="panel-body">
                                                    graph global
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mx-auto">
                                            <h2>Informations par agences</h2>
                                            <div class="panel panel-default">
                                                <div style="background-color: white;" class="panel-heading">Informations par agences</div>
                                                <div class="panel-body">
                                                    graph global
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <h2>Informations globales</h2>
                                            <div class="panel panel-default">
                                                <div style="background-color: white;" class="panel-heading">Informations globales</div>
                                                <div class="panel-body">
                                                    graph global
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mx-auto">
                                            <h2>Informations par agences</h2>
                                            <div class="panel panel-default">
                                                <div style="background-color: white;" class="panel-heading">Informations par agences</div>
                                                <div class="panel-body">
                                                    graph global
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <h2>Informations globales</h2>
                                            <div class="panel panel-default">
                                                <div style="background-color: white;" class="panel-heading">Informations globales</div>
                                                <div class="panel-body">
                                                    graph global
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mx-auto">
                                            <h2>Informations par agences</h2>
                                            <div class="panel panel-default">
                                                <div style="background-color: white;" class="panel-heading">Informations par agences</div>
                                                <div class="panel-body">
                                                    graph global
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                            </div>
                            <!-- FIN CONTENU PRINCIPAL -->
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
    <style>
        #sidebar_menu >li>a:hover{
          background-color: #202845;
        }
        .panel-heading {
            background-color: white;
            font-size: 20px;
            font-weight: bold;
        }
    </style>

</body>

</html>