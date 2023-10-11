<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ URL::to('assets/images/logo/images.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if (Auth::user()->role_name=='Admin')
                            <span>Nom: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                            <hr>
                            <span>le rôle:</span>
                            <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Super Admin')
                                <span>Nom: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>le rôle:</span>
                                <span class="badge bg-info">Super Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Normal User')
                                <span>Nom: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>le rôle:</span>
                                <span class="badge bg-warning">User Normal</span>
                            @endif
                        </div>
                    </div>
                </li>
                
                @if (Auth::user()->role_name=='Admin')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>A propos du système</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('userManagement') }}">Contrôle utilisateur</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('activity/log') }}">Journal d'activité de l'utilisateur</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('activity/login/logout') }}">Journal d'activité</a>
                            </li>
                            <li class="submenu-item active">
                                <a href="{{ route('user/add/new') }}">ajouter un nouvel utilisateur</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role_name=='Ressources humaines')
                    <li class="sidebar-item ">
                        <a href="{{ route('user/add/new') }}" class='sidebar-link'>
                            <i class="bi bi-person-plus-fill"></i>
                            <span>ajouter un nouvel Personnel</span>
                        </a>
                    </li>
                    @endif
                <li class="sidebar-item">
                    <a href="{{ route('change/password') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Changer Mot de passe</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{url('edit/profile')}}" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Editer le Profile</span>
                    </a>
                </li>

                @if(Auth::user()->role_name=='Directeur')
                <li class="sidebar-item">
                    <a href="{{url('liste/personnels')}}" class='sidebar-link'>
                    <i class="card-list"></i>
                        <span>Liste personnels</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-card-checklist"></i>
                        <span>Mes Services</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{url('liste/demmande')}}">Demmandes</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{url('liste/attestation')}}">Attestations</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('statistiques') }}" class='sidebar-link'>
                    <i class="bi bi-graph-up"></i>
                        <span>Statistiques</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Se deconnecter</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
</div>