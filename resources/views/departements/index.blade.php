@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}">
<div class="container" style="margin-left:286px;">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Departements de L'ENSAJ</h2>
                    </div>
                    <br><br>
                    <div class="card-body">
                        <a href="{{ url('/departement/create') }}" class="btn btn-success btn-sm" title="Add New departement">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un nouveau département
                        </a>
                        <br/>
                        <br/>
                        
                    <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Chef de Département</th>
                                        <th>Operations</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($departements as $item)
                                  @if($item->nom!='vide')
                                    <tr>
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td>{{ $item->nom}}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->chef_de_departement }}</td>
 
                                        <td>
                                            <a href="{{ url('/departement/' . $item->id) }}" title="View departement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Details</button></a>
                                            <a href="{{ url('/departement/' . $item->id . '/edit') }}" title="Edit departement"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
 
                                            <form method="POST" action="{{ url('/departement' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete departement" onclick="return alert('pour la suppression')"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


