@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')

<div class="card" style="margin-left:300px;">
  <div class="card-header"></div>
  <div class="card-body">
      
      <form action="{{ url('recherche') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control" required></br>
        <label>Coordinateur de l'entité</label></br>
        <select name="coordinateur" id="coordinateur" class="form-control" required>
                @foreach($data as $key=>$item)
                    <option value="{{ $item->last_name }}">{{ $item->last_name }}</option>
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
