@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div class="card" style="margin-left:300px;">
  <div class="card-header">Modifier un service</div>
  <div class="card-body">
      
      <form action="{{ url('service/' .$services->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$services->id}}" id="id" />
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" value="{{$services->nom}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$services->description}}" class="form-control"></br>
        <label>Chef de Service precedent={{$services->chef_de_service}}</label></br>
        <select name="chef_de_service" id="chef_de_service" class="form-control" required>
                @foreach($data as $key=>$item)
                    <option value="{{ $item->last_name }}">{{ $item->last_name }}</option>
                @endforeach
       </select><br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection