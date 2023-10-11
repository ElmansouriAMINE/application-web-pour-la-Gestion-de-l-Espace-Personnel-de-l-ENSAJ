@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Forme ajouter un nouvel utilisateur</h3>
                <p class="text-subtitle text-muted">ajouter un nouvel utilisateur</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ajouter un nouvel utilisateur</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    {{-- message --}}
    {!! Toastr::message() !!}

    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <br>
                    <form method="POST" action="{{ route('user/add/save') }}" class="md-float-material" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enterez le nom complet">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image" multiple="">
                            <div class="form-control-icon">
                                <i class="bi bi-person-square"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enterez votre Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="date" class="form-control form-control-lg" name="date_embauche" placeholder="date d'embauche">
                            <div class="form-control-icon">
                                <i class="bi bi-calendar-date"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="tel" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter votre N° telephone">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                                @if (Auth::user()->role_name=='Admin')
                                    <option selected disabled>Sélectionnez le rôle</option>
                                    <option value="Admin">Admin</option>
                                @endif
                                    <option value="Personnel">Personnel</option>
                                    <option value="Professeur">Professeur</option>
                                    @if (Auth::user()->role_name=='Admin')
                                    <option value="Secretaire général">Secretaire général</option>
                                    <option value="Ressources humaines">Ressources humaines</option>
                                    <option value="Directeur pédagogique">Directeur pédagogique</option>
                                    <option value="Directeur">Directeur</option>
                                    <option value="Chef de département">Chef de département</option>
                                    <option value="Directeur de recherche">Directeur de recherche</option>
                                    <option value="Chef de filière">Chef de filière</option>
                                    <option value="Chef de laboratoire">Chef de laboratoire</option>
                                    <option value="Chef de service">Chef de service</option>
                                @endif   
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select" name="grade" id="role_name">
                                    <option selected disabled>Sélectionnez le grade</option>
                                    <option value="professeur de l'enseignement supérieur">professeur de l'enseignement supérieur</option>
                                    <option value="professeur habilité">professeur habilité</option>
                                    <option value="professeur-assistant">professeur-assistant</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Choisissez un mot de passe">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirmer le mot de passe">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Créer</button>  
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection