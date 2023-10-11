@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}">


@if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Ressources humaines' || Auth::user()->role_name=='Chef de département')
<h4 style="text-decoration:underline;margin-left: 300px;">Liste des Attestations:</h4>
@endif
@if(Auth::user()->role_name=='Personnel' || Auth::user()->role_name=='Professeur'  )
<h4 style="text-decoration:underline;margin-left: 300px;">Vos Attestations:</h4>
<a href="{{url('passer/attestation')}}"><button class="btn btn-success" style="margin-left: 300px; margin-top:10px;">ajouter nouvelle demmande</button></a>
@endif
<table class="table-style" style="margin-left: 300px;margin-top:10px">
<thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">type</th>
            @if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Ressources humaines')
            <th scope="col">demmandeur</th>
            @endif
            <th scope="col">Etat</th>
            <th scope="col">date de demmande</th>
            @if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Ressources humaines')
            <th scope="col">Traitment</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key =>$item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->type}}</td>
            @if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Ressources humaines')
            <td>{{$item->demandeur}}</td>
            @endif
            <td>{{$item->etat_attestation}}</td>
            <td>{{$item->created_at}}</td>
            @if (Auth::user()->role_name=='Directeur' || Auth::user()->role_name=='Ressources humaines')
            <td class="text-center">
                <a href="{{url('valider/attestation/'.$item->id.'/'.$item->user_id.'/'.$item->type)}}">
                    <span class="badge bg-info"><i class="bi bi-check"></i></span>
                </a>
                <a href="{{url('delete/attestation/'.$item->id)}}" onclick="return confirm('Are you sure to want to delete it?')">
                    <span class="badge bg-danger"><i class="bi bi-trash"></i></span>
                </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection






