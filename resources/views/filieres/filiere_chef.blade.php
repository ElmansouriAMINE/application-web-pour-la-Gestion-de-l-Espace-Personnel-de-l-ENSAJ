@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')


<link rel="stylesheet" href="{{URL::to('assets/css/affectation.css')}}">


<div class="card" style="margin-left:300px;">
  <div class="card-header"></div>
  <div class="card-body">
      
  {!! csrf_field() !!}
        @method("PATCH")
       @foreach($filiere as $key=>$item)
        <h1><label>Gestion de la filiere : {{ $item->nom }}</label></br></h1>

    
        <hr><hr><hr>
        <a href="{{ url('/edit/filiere/' . $item->id) }}" title="View filiere"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Modifier</button></a>
   @endforeach
