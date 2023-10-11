@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')

<div class="card" style="margin-left:300px;">
  <div class="card-header">Page de Modification</div>
  <div class="card-body">
      
      <form action="{{ url('annonce/' .$annonces->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$annonces->id}}" id="id" />
        <label>Titre</label></br>
        <input type="text" name="titre" id="titre" value="{{$annonces->titre}}" class="form-control"></br>
        <label>Contenu</label></br>
        <input type="text" name="contenu" id="contenu" value="{{$annonces->contenu}}" class="form-control"></br>
        <label>Ajouter un fichier</label></br>
        <input type="file" name="fichier" id="fichier" value="{{$annonces->fichier}}" class="form-control"></br>
        <input type="submit" value="Modifier" class="btn btn-success"></br>
    </form>
   
  </div>
</div>



@endsection