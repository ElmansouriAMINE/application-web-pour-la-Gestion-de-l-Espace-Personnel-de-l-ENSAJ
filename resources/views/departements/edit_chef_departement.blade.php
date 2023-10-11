@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div class="card" style="margin-left:300px;">
  <div class="card-header">Page de Modification</div>
  <div class="card-body">
      
      <form action="{{ url('departement/' .$departements->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$departements->id}}" id="id" />
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" value="{{$departements->nom}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$departements->description}}" class="form-control"></br>
        
        <input type="submit" value="Modifier" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection