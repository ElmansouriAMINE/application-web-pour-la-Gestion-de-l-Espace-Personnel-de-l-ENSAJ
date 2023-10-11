@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')


<div class="card" style="margin-left:300px;">
  <div class="card-header">Ajout d'un nouveau service</div>
  <div class="card-body">
      
      <form action="{{ url('service') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control" required></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control" required></br>
        <label>Chef de service :(*)</label></br>
        <select name="chef_de_service" id="chef_de_service" class="form-control" required>
                @foreach($data as $key=>$item)
                    <option value="{{ $item->last_name }}">{{ $item->last_name }}</option>
                @endforeach
       </select><br>

        <input type="submit" value="Ajouter" class="btn btn-success"><br>
    </form>
   
  </div>
</div>







@endsection