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
                                <form style="margin-top: 15px;width: 800px;" action="" class="form form-inline">
                                     <span style="font-weight: bold;font-size: 20px; color: white;">Agence : 
                                        <select style="width: 350px;color: black;font-size: 20px;padding: 5px; cursor: pointer;" class="form-control" name="" id="">
                                            @foreach ($get_agence as $item)
                                                <option value="{{$item->nom}}" class="user_agence_pointer">{{$item->nom}}</option>
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
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name">{{Auth::user()->nom_utilisateur}}</span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li>
                                                    <a href="{{route('edit_user_admin')}}"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>Changer le mot de passe</a>
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
                                        <h1>Ajouter utilisateur</h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form action="{{route('add_user')}}" method="POST">
                                                @csrf

                                                <div class="form-group text-justify">
                                                    <label for="nom_utilisateur">Nom d'utilisateur</label>
                                                    <input id="nom_utilisateur" type="text" class="form-control" name="nom_utilisateur" placeholder="Nom d'utilisateur" value="{{old('nom_utilisateur')}}">
                                                    @error('nom_utilisateur')
                                                        <span class="invalid-feedback text-theme-6" role="alert" style="color: red;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
        
                                                <div class="form-group text-justify">
                                                    <label for="role">Rôle</label>
                                                    <select name="role" id="role" class="form-control">
                                                        <option value="ROLE_CODEX">Codex</option>
                                                        <option value="ROLE_COOPEC">Coopec</option>
                                                        <option value="ROLE_ADMIN">Admin</option>
                                                        <option value="ROLE_ADMIN_READ_ONLY">Codex Read Only</option>
                                                    </select>
                                                </div>
        
                                                <div class="form-group text-justify">
                                                    <label for="agence">Agences</label>
                                                    <select name="agence" id="agence" class="form-control">
                                                        <option value="" selected></option>
                                                        @foreach ($get_agence as $item)
                                                            <option value="{{$item->nom}}">{{$item->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
        
                                                <div class="form-group text-justify">
                                                    <label for="password">Mot de passe</label>
                                                    <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe">
                                                    @error('password')
                                                        <span class="invalid-feedback text-theme-6" role="alert" style="color: red;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
        
                                                <div class="form-group text-justify">
                                                    <label for="confirm_password">Répéter le mot de passe</label>
                                                    <input id="confirm_password" type="password" class="form-control" name="password_confirmation" placeholder="Répéter le mot de passe">
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback text-theme-6" role="alert" style="color: red;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group text-justify">
                                                    <button type="submit" class="btn btn-danger">Sauvegarder</button>
                                                    <a href="{{route('utilisateur')}}" class="btn btn-default">Annuler</a>
                                                </div>
                                            </form>
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
        .btn{
            border-radius: 25px;
        }
    </style>
    <script>
        $(function(){
            $(".user_table").DataTable({
            "language": {
               "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
            },
            responsive:true,
            ordering:false
         });
        });
    </script>

</body>

</html>