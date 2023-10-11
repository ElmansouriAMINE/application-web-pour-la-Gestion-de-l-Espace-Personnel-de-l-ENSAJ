@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content') 
<div class="card" style="margin-left:300px;">
  <div class="card-header"></div>
  <div class="card-body">
  
      <form action="{{ url('filiere/' .$filieres->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$filieres->id}}" id="id" />
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" value="{{$filieres->nom}}" class="form-control"></br>
        <label>Nom Complet</label></br>
        <input type="text" name="nom_complet" id="nom_complet" value="{{$filieres->nom_complet}}" class="form-control"></br>
        <label>description</label></br>
        <input type="file" name="description" id="description" value="{{$filieres->description}}" class="form-control" required></br>
        
        <input type="submit" value="Ajouter" class="btn btn-success"></br>
    </form>

   
  </div>
</div>
 
@endsection