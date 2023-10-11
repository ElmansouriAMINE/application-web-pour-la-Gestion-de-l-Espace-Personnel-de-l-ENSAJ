@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')


<div class="card" style="margin-left:300px;">
  <div class="card-header">Creation des telechargements</div>
  <div class="card-body">
      
      <form action="{{ url('telechargement') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Titre</label></br>
        <input type="text" name="titre" id="titre" class="form-control" required></br>
        <label>Fichier:</label></br>
        <input type="file" name="fichier" id="fichier" class="form-control" required></br>
        <input type="submit" value="Ajouter" class="btn btn-success"><br>
    </form>
   
  </div>
</div>







@endsection