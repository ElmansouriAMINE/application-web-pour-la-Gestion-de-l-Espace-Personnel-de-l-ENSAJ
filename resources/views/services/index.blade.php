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
                        <h2>Gestion des services/missions administratives</h2>
                    </div>
                    <div class="card-body">
                        <br><br>
                        <a href="{{ url('/service/create') }}" class="btn btn-success btn-sm" title="Add New service">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un nouveau service
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
                                        <th>Chef de Service</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $item)
                                  @if($item->nom!='vide')
                                    <tr>
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->chef_de_service }}</td>
                                        
                                        <td>
                                            <a href="{{ url('/service/' . $item->id) }}" title="View service"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Detail</button></a>
                                            <a href="{{ url('/service/' . $item->id . '/edit') }}" title="Edit service"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modifier</button></a>
 
                                            <form method="POST" action="{{ url('/service' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete service" onclick="return confirm(&quot;Voulez-vous Vraiment le supprimer?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
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