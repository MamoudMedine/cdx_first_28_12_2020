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
            @include('layouts.viewer_nav')
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
                                                    <a href="{{route('edit_user_cro')}}"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>Changer le mot de passe</a>
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
            <!-- CONTENU Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid" style="margin-top: 25px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd" style="background-color: white;">
                                    <div class="main-sparkline13-hd">
                                        <h1>Dossiers</h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="row mg-b-15">
                                        <div class="col-md-10">
                                           <form action="">
                                             <div class="row">
                                                <div class="col-md-5">
                                                        <div class="row">
                                                             <div class="col-md-2 col-sm-2 col-xs-2 text-right"  style="justify-content: right;">
                                                                <input style="margin: 0!important;float: right;" type="checkbox" class="form-control">
                                                             </div>
                                                             <div style="font-weight: bold; font-size: 18px;justify-content: left;"  
                                                              class="col-md-10 text-justify" > 
                                                               Dossiers en impayés
                                                            </div>                                              
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2 col-sm-2 col-xs-2 text-right" style="justify-content: right;">
                                                                <input type="checkbox" style="margin: 5!important;float: right;margin-bottom: 10px;" 
                                                                class="form-control">
                                                             </div>
                                                             <div  style="font-weight: bold; font-size: 18px;padding-top: 5px;justify-content: left;" 
                                                             class="col-md-10 text-justify" >
                                                             Dossiers traités par la banque
                                                            </div>    
                                                        </div>
                                                    
                                                </div>
                                                <div class="col-md-3 mg-b-10" style="align-content: flex-start;">
                                                    <select class="form-control" name="" id="">
                                                        <option class="form-control" selected value="Aucun fitre">Aucun filtre</option>
                                                        <option class="form-control" value="active">Active</option>
                                                        <option class="form-control" value="close">Close</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2" style="justify-content: left;">
                                                    <button class="btn btn-danger" style="float: left;">
                                                        <i class="fa fa-filter"></i> Filtre
                                                     </button>
                                                </div>
                                             </div>
                                           </form>
                                        </div>
                                    </div>
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">
                                            <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="name" data-editable="true">CODE DOSSIER</th>
                                                    <th data-field="email" data-editable="true">QUANTITE D'ECHEANCE</th>
                                                    <th data-field="phone" data-editable="true">IMPAYE</th>
                                                    <th data-field="company" data-editable="true">CAITAL INITIAL</th>
                                                    <th data-field="complete">NOM COMPLET DU CLIENT</th>
                                                    <th data-field="task" data-editable="true">ADRESSE</th>
                                                    <th data-field="date" data-editable="true">TELEPHONE</th>
                                                    <th data-field="price" data-editable="true">GENRE DU CLIENT</th>
                                                    <th data-field="action">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($folders as $item)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{$item->code_dossier ?? ''}}</td>
                                                        <td>{{$item->code_dossier ?? ''}}</td>
                                                        <td>{{$item->code_dossier ?? ''}}</td>
                                                        <td>{{$item->capital ?? ''}}.</td>
                                                        <td>{{$item->nom_client ?? ''}}</td>
                                                        <td>{{$item->adressse ?? ''}}</td>
                                                        <td>{{$item->contact ?? ''}}</td>
                                                        <td>{{$item->sexe ?? ''}}</td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENU End -->
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
    </style>
    <script>
        $(function(){
        
        });
    </script>

</body>

</html>