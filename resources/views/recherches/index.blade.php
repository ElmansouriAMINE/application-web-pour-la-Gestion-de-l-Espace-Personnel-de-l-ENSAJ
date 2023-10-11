@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div class="container" style="margin-left:286px;">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Entités de recherche scientifiques de L'ENSAJ</h2>
                    </div>
                    <br><br>
                    <div class="card-body">
                        <a href="{{ url('/recherche/create') }}" class="btn btn-success btn-sm" title="Add New departement">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une entité de recherche
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
                                        <th>Coordinateur de l'entité</th>
                                        <th>Operations</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($recherches as $item)
                                  @if($item->nom!='vide')
                                    <tr>
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td>{{ $item->nom}}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->coordinateur }}</td>
 
                                        <td>
                                            <a href="{{ url('/recherche/' . $item->id) }}" title="View recherche"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Details</button></a>
                                            <a href="{{ url('/recherche/' . $item->id . '/edit') }}" title="Edit recherche"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
 
                                            <form method="POST" action="{{ url('/recherche' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete recherche" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
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


