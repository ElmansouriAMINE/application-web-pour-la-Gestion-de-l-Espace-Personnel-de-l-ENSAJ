@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')

<div class="card" style="margin-left:300px;">
  <div class="card-header">Page des telechargements</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Titre : {{ $telechargements->titre }}</h5>
        <!-- <p class="card-text">Fichier: {{ $telechargements->fichier }}</p> -->
        <a href="{{ url('/Telechargement/download/'.$telechargements->fichier) }}" title="View telechargement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Telecharger</button></a>
  </div>
       
    </hr>
  
  </div>
</div>







@endsection