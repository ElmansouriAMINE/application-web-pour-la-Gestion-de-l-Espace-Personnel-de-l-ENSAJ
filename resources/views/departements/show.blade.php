@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
 
<div class="card" style="margin-left:300px;">
  <div class="card-header">Page des departements</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Nom : {{ $departements->nom }}</h5>
        <p class="card-text">Description : {{ $departements->description }}</p>
        <p class="card-text">Chef de Departement : {{ $departements->chef_de_departement }}</p>
  </div>
       
    </hr>
  
  </div>
</div>
@endsection