@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')

<div class="card" style="margin-left:300px;">
  <div class="card-header">Page du directeur Pedagogique</div>
  <div class="card-body">
      
      <form action="{{ url('departement') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control" required></br>
        <label>Chef de Département</label></br>
        <select name="chef_de_departement" id="chef_de_departement" class="form-control" required>
                @foreach($data as $key=>$item)
                    <option value="{{ $item->last_name }} {{$item->first_name}}">{{ $item->last_name }} {{$item->first_name}}</option>
                @endforeach
       </select><br>
        <!-- <input type="text" name="chef_de_departement" id="chef_de_departement" class="form-control"></br> -->
        <label>Description</label></br>
        <textarea rows="12" cols="100"  name="description" id="description" required></textarea><br>
        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>
   
  </div>
</div>
 
@endsection
