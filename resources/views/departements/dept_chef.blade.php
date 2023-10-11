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
       @foreach($departement as $key=>$item)
        <h1><label>Gestion de la departement : {{ $item->nom }}</label></br></h1>

    
        <hr><hr><hr>
        <a href="{{ url('/edit/departement/' . $item->id) }}" title="View departement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Modifier</button></a>
       @endforeach
