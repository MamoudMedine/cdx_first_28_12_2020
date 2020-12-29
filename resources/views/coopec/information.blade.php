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

    @include('layouts.header')
</head>

<body class="materialdesign">
<div class="wrapper-pro">
    <div class="left-sidebar-pro" >
        @include('layouts.admin_nav')
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
                                               <option style="cursor: pointer;" value="{{$item->code_agence}}">{{$item->nom}}
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
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid" style="padding-top: 15px;padding-left: 30px;">
                <div class="row mg-b-15" >
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Date de debut</h5>
                                <div id="datepickerstart" class="input-group date" data-date-format="mm-dd-yyyy">
                                    <input class="form-control" type="text" name="start_date"/>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <h5>Date de fin</h5>
                                <div id="datepickerend" class="input-group date" data-date-format="mm-dd-yyyy">
                                    <input class="form-control" type="text" name="end_date" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-10">
                        <h2>Information globales</h2>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div style="background-color: white;" class="panel-heading">Dossiers traites</div>
                                    <div class="panel-body dossier_global">
                                        {{$dossier_global}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div style="background-color: white;" class="panel-heading">SMS</div>
                                    <div class="panel-body sms_global">
                                        {{$sms_global}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div style="background-color: white;" class="panel-heading">Appels</div>
                                    <div class="panel-body call_global">
                                        {{$call_global}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div style="background-color: white;" class="panel-heading">Visites</div>
                                    <div class="panel-body visit_global">
                                        {{$visit_global}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-10">
                        <h2>Informations par agnences</h2>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div style="background-color: white;" class="panel-heading">Dossiers traites</div>
                                    <div class="panel-body dossier_agence">
                                        {{$dossier_agence}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div style="background-color: white;" class="panel-heading">SMS</div>
                                    <div class="panel-body call_agence">
                                        {{$call_agence}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div style="background-color: white;" class="panel-heading">Appels</div>
                                    <div class="panel-body sms_agence">
                                        {{$sms_agence}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div style="background-color: white;" class="panel-heading">Visites</div>
                                    <div class="panel-body visit_agence">
                                        {{$visit_agence}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 40px 15px 0 15px">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table_adm_dossier" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>CODE DOSSIER</th>
                                    <th>CODE CLIENT</th>
                                    <th>NOM DU CLIENT</th>
                                    <th>TELEPHONE DU CLIENT</th>
                                    <th>SMS</th>
                                    <th>APPELS</th>
                                    <th>CONTENU</th>
                                    <th>OBSERVATIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($get_all_user as $item)
                                    <tr>
                                        <td></td>
                                        <td class="cde_dossier">{{$item->code_dossier}}</td>
                                        <td class="cde_client">{{$item->code_client}}</td>
                                        <td class="nom_client">{{$item->nom_client}}</td>
                                        <td class="contact">{{$item->telephone}}</td>
                                        <td>@if($item->type == 'TYPE_SMS') {{date('d/m/Y', strtotime($item->created_at))}} @endif</td>
                                        <td>@if($item->type == 'TYPE_CALL') {{date('d/m/Y', strtotime($item->created_at))}} @endif</td>
                                        <td>{{$item->commentaire}}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#admin_information" class="btn btn-danger" id="table_information_observation" data-id="{{$item->code_client}}">
                                                <i class=" fa fa-comment-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div>
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
        @include('admin.mdl_information.observation')
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
