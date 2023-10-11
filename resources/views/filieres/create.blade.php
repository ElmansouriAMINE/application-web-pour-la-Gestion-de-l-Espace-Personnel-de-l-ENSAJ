@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
 
<div class="card" style="margin-left:300px;">
  <div class="card-header">Page des filieres</div>
  <div class="card-body">
      
      <form action="{{ url('filiere') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control" required></br>
        <label>Nom Complet</label></br>
        <input type="text" name="nom_complet" id="nom_complet" class="form-control" required></br>
        <label>Departement</label></br>
        <select name="departement" id="departement" class="form-control" required>
                @foreach($departement_data as $key=>$item)
                    <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                @endforeach
       </select><br>
        <label>Chef de filiere</label></br>
        <select name="coordinateur" id="coordinateur" class="form-control" required>
                @foreach($data as $key=>$item)
                    <option value="{{ $item->last_name }}">{{ $item->last_name }}</option>
                @endforeach
       </select><br>
        <label>Fichier descriptif</label></br>
        <input type="file" name="description" id="description" class="form-control" accept=".pdf,.docx,.png,.jpg,.jpeg" required></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection