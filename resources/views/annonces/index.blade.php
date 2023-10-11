@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div class="container" style="margin-left:300px;">
        <div class="row">
            <div class="col-md-11">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success')}}
                </div>

                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Annonces</h2>
                    </div>
                    <br><br>
                    <div class="card-body">
                    @if(Auth::user()->role_name =='Directeur' || Auth::user()->role_name =='Secretaire général' || Auth::user()->role_name =='Ressources humaines')
                        <a href="{{ url('/annonce/create') }}" class="btn btn-success btn-sm" title="Add New telechargement">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une nouvelle annonce
                        </a>
                    @endif
                        <br/>
                        <br/>
                        
                    <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Titre</th>
                                        <th>Contenu</th>
                                        <th>Ajouter un Fichier</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($annonces as $item)
                                
                                    <tr>
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td>{{ $item->titre}}</td>
                                        <td>{{ $item->contenu }}</td>
                                        <td>{{ $item->fichier }}</td>
 
                                        <td>
                                            <a href="{{ url('/annonce/' . $item->id) }}" title="View annonce"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Details</button></a>
                                            @if(Auth::user()->role_name =='Directeur' || Auth::user()->role_name =='Secretaire général' || Auth::user()->role_name =='Ressources humaines')
                                            <a href="{{ url('/annonce/' . $item->id . '/edit') }}" title="Edit annonce"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
 
                                            <form method="POST" action="{{ url('/annonce' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete annonce" onclick="return confirm(&quot;voulez-vous Vraiment le supprimer ?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                            </form>
                                            @endif
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

