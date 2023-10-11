@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')

<div class="card" style="margin-left:300px;">
  <div class="card-header">Page des Annonces</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Titre : {{ $annonces->titre }}</h5>
        <p class="card-text">Contenu : {{ $annonces->contenu }}</p>
        <!-- <p class="card-text">le Fichier ajouté : {{ $annonces->fichier }}</p> -->
        <a href="{{ url('/annonce/download/'.$annonces->fichier) }}" title="View annonce"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Telecharger</button></a>

  </div>
       
    </hr>
  
  </div>
</div>







@endsection