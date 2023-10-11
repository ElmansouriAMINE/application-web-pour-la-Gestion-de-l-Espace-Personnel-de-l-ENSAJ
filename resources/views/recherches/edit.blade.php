@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div class="card" style="margin-left:300px;">
  <div class="card-header">Page de Modification</div>
  <div class="card-body">
      
      <form action="{{ url('recherche/' .$recherches->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$recherches->id}}" id="id" />
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" value="{{$recherches->nom}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$recherches->description}}" class="form-control"></br>
        <label> Le nouveau Coordinateur</label></br>
        <select name="coordinateur" id="coordinateur" class="form-control" required>
                @foreach($data as $key=>$item)
                    <option value="{{ $item->last_name }}">{{ $item->last_name }}</option>
                @endforeach
       </select><br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection