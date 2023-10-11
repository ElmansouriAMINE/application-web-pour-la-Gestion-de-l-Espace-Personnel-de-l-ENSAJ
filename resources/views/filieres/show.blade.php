@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div class="card" style="margin-left:300px;">
  <div class="card-header">filieres Page</div>
  <div class="card-body">
   

        <div class="card-body">
        <h5 class="card-title">Nom : {{ $filieres->nom }}</h5>
        <p class="card-text">Nom complet : {{ $filieres->nom_complet }}</p>
        <p class="card-text">Description : {{ $filieres->description }}</p>
        <p class="card-text">Departement : {{ $filieres->departement }}</p>
        <p class="card-text">Coordinateur : {{ $filieres->coordinateur }}</p>
       
  </div>
  </div>
  </div>
  </div>

  </div>
       
    </hr>
  
  </div>
</div>
@endsection