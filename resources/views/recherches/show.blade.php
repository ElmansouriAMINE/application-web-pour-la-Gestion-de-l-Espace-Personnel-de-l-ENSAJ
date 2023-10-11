@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
 
<div class="card" style="margin-left:300px;">
  <div class="card-header">Page de l'entité choisie</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Nom : {{ $recherches->nom }}</h5>
        <p class="card-text">Description : {{ $recherches->description }}</p>
        <p class="card-text">Coordinateur  de l'entité choisie: {{ $recherches->coordinateur }}</p>
  </div>
       
    </hr>
  
  </div>
</div>
@endsection