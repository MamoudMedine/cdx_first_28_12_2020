<!doctype html>
<html  lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Codex | Administration</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts -->
        @include('layouts.header')
</head>

<body class="materialdesign">
    <div class="wrapper-pro">
        <div class="left-sidebar-pro" >
            @include('layouts.admin_nav')// ADMIN SIDEBAR
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
                                <form style="margin-top: 15px;width: 600px;" action="" class="form form-inline">
                                     <span style="font-weight: bold;font-size: 20px; color: white;">Agence :
                                        <select class="selectpicker text-info" data-live-search="true"
                                                style="color: black;font-size: 15px;cursor: pointer;"
                                                name="dos_nom_agence" id="dos_nom_agence">
                                            @foreach ($get_agence as $item)
                                                <option {{$code_agence==$item->code_agence?'selected':''}} style="cursor: pointer;"
                                                        value="{{$item->code_agence}}">{{$item->nom}}
                                                </option>
                                            @endforeach
                                        </select>
                                     </span>
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
                                                <span class="fa fa-user"></span>
                                                <span class="admin-name">{{Auth::user()->nom_utilisateur}}</span>
                                                <span class="fa fa-arrow-down"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li>
                                                    <a href="{{route('edit_user_admin')}}"><span class="fa fa-wrench"></span>Changer le mot de passe</a>
                                                </li>
                                                <li>
                                                    <div class="p-2 border-t border-theme-40">
                                                        <a class="fa fa-sign-out" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Déconnexion </a>

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
                                                    <select class="selectpicker show-tick" name="" id="">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="table_adm_dossier" class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>DETAILS</th>
                                                        <th>CODE DOSSIER</th>
                                                        <th>QUANTITE D'ECHEANCE</th>
                                                        <th>IMPAYE</th>
                                                        <th>CAPITAL INITIAL</th>
                                                        <th>NOM COMPLET DU CLIENT</th>
                                                        <th>ADRESSE</th>
                                                        <th>TELEPHONE</th>
                                                        <th>GENRE DU CLIENT</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                      @csrf
                                                      @foreach ($folders as $item)
                                                        <tr>
                                                            <input type="hidden" value="{{$item->code_client ?? ''}}">
                                                            <input type="hidden" value="{{$item->nom_client ?? ''}}">
                                                            <input type="hidden" value="{{$item->adresse ?? ''}}">
                                                            <input type="hidden" value="{{$item->numero_piece ?? ''}}">
                                                            <input type="hidden" value="{{$item->contact ?? ''}}">
                                                            <input type="hidden" value="{{$item->situation?? ''}}">
                                                            <input type="hidden" value="{{$item->date_naissance?? ''}}">
                                                            <input type="hidden" value="{{$item->sexe?? ''}}">
                                                            <input type="hidden" value="{{$item->code_agence?? ''}}">
                                                            <input type="hidden" value="{{$item->pays_residence?? ''}}">
                                                            <input type="hidden" value="{{$item->pays_nationalite?? ''}}">
                                                            <input type="hidden" value="{{$item->nom_mere?? ''}}">

                                                            <input type="hidden" value="{{$item->num_compte_client?? ''}}">
                                                            <input type="hidden" value="{{$item->capital?? ''}}">
                                                            <input type="hidden" value="{{$item->encours_credit?? ''}}">
                                                            <input type="hidden" value="{{$item->capital_total_amorti?? ''}}">
                                                            <input type="hidden" value="{{$item->capital_restant_amorti?? ''}}">
                                                            <input type="hidden" value="{{$item->duree_pret?? ''}}">

                                                            <input type="hidden" id="get_deblocages_url" cod_dos="{{$item->code_dossier}}" value="{{route('get_deblocages')}}">
                                                            <td>
                                                                <button cod_dos="{{$item->code_dossier}}" data-toggle="modal" data-target="#dos_detail_mdl"
                                                                        class="btn btn-primary dos_detail_mdl" data-backdrop="false"
                                                                        data-keyboard="static">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </td>
                                                            <td>{{$item->code_dossier ?? ''}}</td>
                                                            <td>{{$item->code_dossier ?? ''}}</td>
                                                            <td>{{$item->code_dossier ?? ''}}</td>
                                                            <td>{{$item->capital ?? ''}}.</td>
                                                            <td>{{$item->nom_client ?? ''}}</td>
                                                            <td>{{$item->adresse ?? ''}}</td>
                                                            <td>{{$item->contact ?? ''}}</td>
                                                            <td>{{$item->sexe ?? ''}}</td>
                                                            <td>
                                                                <div class="row align-center" style="margin-bottom: 1px;">
                                                                    <button class="btn btn-danger dos_sms_mdl"
                                                                             data-toggle="modal"
                                                                             data-target="#dos_sms_mdl"
                                                                             data-backdrop="false"
                                                                             data-keyboard="static"
                                                                    data-tooltip="tooltip"
                                                                        data-original-title="SMS"
                                                                        data-placement="top">
                                                                        <i class="fa fa-comment-o"></i>
                                                                    </button>&nbsp;
                                                                    <button class="btn btn-danger dos_call_mdl"
                                                                            data-toggle="modal"
                                                                            data-target="#dos_call_mdl"
                                                                            data-backdrop="false"
                                                                            data-keyboard="static"
                                                                         data-tooltip="tooltip"
                                                                        data-original-title="SMS"
                                                                        data-placement="top">
                                                                        <i class="fa fa-phone"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="row align-center">
                                                                    <button class="btn btn-danger dos_visit_mdl"
                                                                            data-toggle="modal"
                                                                            data-target="#dos_visit_mdl"
                                                                            data-backdrop="false"
                                                                            data-keyboard="static"
                                                                        data-tooltip="tooltip"
                                                                        data-original-title="SMS"
                                                                        data-placement="top">
                                                                        <i class="fa fa-home"></i>
                                                                    </button>&nbsp;
                                                                    <button class="btn btn-danger dos_anomalie_mdl"
                                                                            data-toggle="modal"
                                                                            data-target="#dos_anomalie_mdl"
                                                                            data-backdrop="false"
                                                                            data-keyboard="static"
                                                                        data-tooltip="tooltip"
                                                                        data-original-title="SMS"
                                                                        data-placement="top">
                                                                        <i class="fa fa-exclamation-triangle"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
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
                </div>
            </div>
            <!-- CONTENU End -->
        </div>
    </div>
    <input type="hidden" id="get_dossiers_url" value="{{route('get_dossiers_url')}}">
    <!-- Footer Start-->
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p class="text-center">
                            Copyright &#169; 2020 tout droit reservé. par
                            <a href="https://colorlib.com">Carrement web</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
    @include('layouts.footer')
    @include('admin.mdl_dossier.anomalie')
    @include('admin.mdl_dossier.detail')
    @include('admin.mdl_dossier.visit')
    @include('admin.mdl_dossier.call')
    @include('admin.mdl_dossier.sms')
    <script src="{{asset('asset/js/admin/dossier.js')}}"></script>

    <style>
        #sidebar_menu >li>a:hover{
          background-color: #202845;
        }
    </style>
</body>

</html>
