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
                <a href="{{route('dashboard_admin')}}" role="button" aria-expanded="false"
                 class="nav-link">
                    <i class="fa big-icon fa-tachometer"></i>
                    <span class="mini-dn">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('information')}}" role="button" aria-expanded="false" class="nav-link">
                    <i class="fa big-icon fa-info-circle"></i>
                    <span class="mini-dn">Information</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('dossier', '00001')}}" role="button" aria-expanded="false" class="nav-link">
                    <i class="fa big-icon fa-folder"></i> <span class="mini-dn">Dossiers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('anomalie')}}" role="button" aria-expanded="false" class="nav-link">
                    <i class="fa big-icon fa-exclamation-circle"></i>
                    <span class="mini-dn">Anomalies</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('utilisateur')}}" role="button" aria-expanded="false" class="nav-link">
                    <i class="fa big-icon fa-users"></i>
                    <span class="mini-dn">Utilisateurs</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('agence')}}" role="button" aria-expanded="false" class="nav-link">
                    <i class="fa big-icon fa-database"></i>
                    <span class="mini-dn">Agences</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
