@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
    <div class="container" style="margin-left:300px;">
        <div class="row">
 
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Filieres de L'ENSAJ</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/filiere/create') }}" class="btn btn-success btn-sm" title="Add New Filiere">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une filiere
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Nom Complet</th>
                                        <th>Description</th>
                                        <th>Departement</th>
                                        <th>Coordinateur</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($filieres as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->nom_complet }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->departement }}</td>
                                        <td>{{ $item->coordinateur }}</td>
 
                                        <td>
                                            <a href="{{ url('/filiere/' . $item->id) }}" title="View Filiere"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Details</button></a>
                                            <a href="{{ url('/filiere/' . $item->id . '/edit') }}" title="Edit Filiere"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
 
                                            <form method="POST" action="{{ url('/filiere' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Filiere" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
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