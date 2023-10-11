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
                    <h3>Forme demmander une attestation</h3>
                    <p class="text-subtitle text-muted">demmander une attestation</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">demmander une attestation</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div id="auth">
            <div class="row h-100">
                <div class="col-lg-5 col-12">
                    <div id="auth-left">
                    <br>
                        <form method="POST" action="{{url('save/attestation')}}" class="md-float-material" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="" >Type de votre attestation:</label><br>
                                <select name="type_attestation" id="">
                                    <option value="attestation de travail"  selected>une attestation de travail</option>
                                    <option value="attestation de salaire">une attestation de salaire</option>
                                </select>
                            </div>

                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Envoyer</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection