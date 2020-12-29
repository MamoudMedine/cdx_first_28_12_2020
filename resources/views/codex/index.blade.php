<!doctype html>
<html lang="fr">
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
    <script type="text/javascript">
        function charts(chart,labs, type, data, bg_color){
            new Chart(chart, {
                type: type,
                data: {
                    labels: labs,
                    datasets: [{
                        data: data,
                        backgroundColor: bg_color,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        labels: {
                            render: 'percentage',
                            fontColor: ['white', 'white'],
                            precision: 2
                        }
                    },
                }
            });
        }
        window.onload = function() {
            var pie_chart2 = document.getElementById('pieChart2');
            var data2 = [40655, 50445];
            var labels2 = ['Total en cours','Total recouvré'];
            var bg_color2 = ['#FF6384','#36A2EB'];
            charts(pie_chart2,labels2, 'pie', data2, bg_color2);

            var pie_chart4 = document.getElementById('pieChart4');
            var data4 = [33655,15000, 40445];
            var labels4 = ['Total en cours','autres','Total recouvré'];
            var bg_color4 = ['#FF6384', '#4F5244','#36A2EB'];
            charts(pie_chart4,labels4, 'pie', data4, bg_color4);

            var bar_chart = document.getElementById('barChart');
            var bar_data = [40655, 49445];
            var bar_labels = ['Total en cours','Total recouvré'];
            var bar_bg_color = ['#FF6384', '#4F5244'];
            charts(bar_chart,bar_labels, 'bar', bar_data, bar_bg_color);

            var bar_chart1 = document.getElementById('barChart1');
            var bar_data1 = [40655, 48445];
            var bar_labels1 = ['Total en cours','Total recouvré'];
            var bar_bg_color1 = ['#FF6384', '#4F5244'];
            charts(bar_chart1,bar_labels1, 'bar', bar_data1, bar_bg_color1);
        }
    </script>
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
                                     <span style="font-weight: bold;font-size: 20px;
                                     color: white;">Agence : <b style="color: red;">{{$get_agence->nom}}</b>
                                     </span>&nbsp;
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
                            <div class="row"> <!-- Recouvrement -->
                                <div class="col-md-5">
                                    <div class="panel panel-default">
                                        <div style="background-color: white;" class="panel-heading">Total du Recouvrement Agence</div>
                                        <div class="panel-body">
                                            <canvas id="pieChart2" width="400" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><!-- Dossiers en retard -->
                                <div class="col-md-5">
                                    <div class="panel panel-default">
                                        <div style="background-color: white;" class="panel-heading">
                                            Total de dossiers en retard par agence</div>
                                        <div class="panel-body">
                                            <canvas id="pieChart4" width="400" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><!-- Actions globale -->
                                <div class="col-md-5">
                                    <div class="panel panel-default">
                                        <div style="background-color: white;" class="panel-heading">Actions par agences</div>
                                        <div class="panel-body">
                                            <canvas id="barChart" width="400" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><!-- Total impayé recouvrer-->
                                <div class="col-md-5">
                                    <div class="panel panel-default">
                                        <div style="background-color: white;" class="panel-heading">
                                            Total Impayé - Recouvré par agence
                                        </div>
                                        <div class="panel-body">
                                            <canvas id="barChart1" width="400" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
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
