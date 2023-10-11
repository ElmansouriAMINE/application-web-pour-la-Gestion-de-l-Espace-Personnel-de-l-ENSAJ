<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ URL::to('assets/images/logo/téléchargement.png') }}" style="width:200px;height:100px"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if (Auth::user()->role_name=='Admin')
                            <hr>
                            <span>le rôle:</span>
                            <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Super Admin')
                                <hr>
                                <span>le rôle:</span>
                                <span class="badge bg-info">Super Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Normal User')
                                <hr>
                                <span>le rôle:</span>
                                <span class="badge bg-warning">User Normal</span>
                            @endif
                            @if(Auth::user()->role_name!='Admin' && Auth::user()->role_name!='Super Admin' && Auth::user()->role_name!='Normal User') 
                                <hr>
                                <span>le rôle:</span>
                                <span class="badge bg-warning">{{ Auth::user()->role_name }}</span>
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
                            <span>ajouter un Personnel</span>
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
                @if(Auth::user()->role_name=='Directeur' )
                <li class="sidebar-item">
                    <a href="{{url('liste/personnels')}}" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                        <span>Liste personnels</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role_name=='Directeur pédagogique' || Auth::user()->role_name=='Secretaire général')
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-building"></i>
                        <span>Departements</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ url('/departement') }}">Liste des departements</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ url('/departement/create') }}">Ajouter un departement</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ url('/filiere/create') }}">Ajouter une filiere</a>
                        </li>               
                    </ul>
                </li>
                @endif
            


























                    @if(Auth::user()->role_name=='Secretaire général')
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-journal-plus"></i>
                        <span>Gestion des services</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ url('/service') }}">Liste des services</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ url('/service/create') }}">Ajouter un Service</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ url('/liste/service') }}">Attribuer un service</a>
                        </li>
                    </ul>
                </li>
            @endif




                @if(Auth::user()->role_name=='Chef de département')
                <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-building"></i>
                            <span>Gestion de departement</span>
                        </a>
                        <ul class="submenu">
                            
                            <li class="submenu-item">
                                <a href="{{ url('/chef_de_departement/departement') }}">Description de departement</a>
                            </li>
                        </ul>
                    </li>
                @endif
 
                @if(Auth::user()->role_name=='Chef de filière')
                <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-building"></i>
                            <span>Gestion de filiere</span>
                        </a>
                        <ul class="submenu">
                            
                            <li class="submenu-item">
                                <a href="{{ url('/coordinateur/filiere') }}">Description de filiere</a>
                            </li>
                        </ul>
                    </li>
                @endif

                

                @if(Auth::user()->role_name=='Chef de laboratoire')
                <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Entité de recherche</span>
                        </a>
                        <ul class="submenu">
                            
                            <li class="submenu-item">
                                <a href="{{ url('/liste/recherche') }}">Ajouter une Entité de recherche</a>
                            </li>
                            
                           
                        </ul>
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
                
                <!-- pour les annonces -->
                <li class="sidebar-item">
                    <a href="{{ url('/annonce') }}" class='sidebar-link'>
                        <i class="bi bi-bell-fill"></i>
                        <span>Annonces</span>
                    </a>
                </li>
                <!-- fin pour les annonces -->


                <li class="sidebar-item">
                        <a href="{{ url('/telechargement') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-down-circle"></i>
                            <span>Telechargements</span>
                        </a>
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
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>