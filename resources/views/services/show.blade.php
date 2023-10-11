@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
 
<div class="card" style="margin-left:300px;">
  <div class="card-header">Informations sur ce Service </div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Nom : {{ $services->nom }}</h5>
        <p class="card-text">Description : {{ $services->description }}</p>
        <p class="card-text">Chef de Service: {{ $services->chef_de_service }}</p>
  </div>
       
    </hr>
  
  </div>
</div>
@endsection