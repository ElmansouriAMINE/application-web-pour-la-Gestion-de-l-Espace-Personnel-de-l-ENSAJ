@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}">

@if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Chef de service' || Auth::user()->role_name=='Chef de département')
<h4 style="text-decoration:underline;margin-left: 300px;">Liste des Demmandes:</h4>
@endif
@if(Auth::user()->role_name=='Personnel' || Auth::user()->role_name=='Professeur'  )
<h4 style="text-decoration:underline;margin-left: 300px;">Vos Demmandes:</h4>
<a href="{{url('passer/demmande')}}"><button class="btn btn-success" style="margin-left: 300px; margin-top:10px;">ajouter nouvelle demmande</button></a>
@endif
<table class="table table-bordered" style="margin-left: 300px; margin-top:10px; width:1050px;" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">type</th>
            @if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Chef de service' || Auth::user()->role_name=='Chef de département')
            <th scope="col">demmandeur</th>
            @endif
            <th scope="col">justification</th>
            <th scope="col">lieu</th>
            <th scope="col">Etat</th>
            <th scope="col">date de depart</th>
            <th scope="col">date de retour</th>
            @if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Chef de service' || Auth::user()->role_name=='Chef de département')
            <th scope="col">Traitment</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key =>$item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->type}}</td>
            @if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Chef de service' || Auth::user()->role_name=='Chef de département')
            <td>{{$item->demandeur}}</td>
            @endif
            <td>{{$item->justification}}</td>
            <td>{{$item->lieu}}</td>
            <td>{{$item->etat_demmande}}</td>
            <td>{{$item->date_depart}}</td>
            <td>{{$item->date_retour}}</td>
            @if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Chef de service' || Auth::user()->role_name=='Chef de département')
            <td class="text-center">
                <a href="{{url('valider/demmande/'.$item->id.'/'.$item->user_id.'/'.$item->type)}}">
                    <span class="badge bg-info"><i class="bi bi-check"></i></span>
                </a>
                <a href="{{url('/download',$item->justification)}}">
                    <span class="badge bg-success"><i class="bi bi-download"></i></span>
                </a>
                <a href="{{url('delete/demmande/'.$item->id)}}" onclick="return confirm('Are you sure to want to delete it?')">
                    <span class="badge bg-danger"><i class="bi bi-trash"></i></span>
                </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection