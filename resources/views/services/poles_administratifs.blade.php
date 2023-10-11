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
                        <h2>Affectation de personnels aux services administratifs</h2>
                    </div>
                    <br><br>
                    <div class="card-body">
                        <!-- <a href="{{ url('/departement/create') }}" class="btn btn-success btn-sm" title="Add New departement">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un nouveau département
                        </a> -->
                        <br/>
                        <br/>
                        
                    <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Service</th>
                                        <th>Chef de Service</th>
                                        <th>Personnels de Service</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $item)
                                    <tr>
                                     @if($item->nom!='vide')
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td><a href="{{ url('/service/' . $item->id .'/affecter/personnels')}}">{{ $item->nom }}</a></td>
                                        <td>{{ $item->chef_de_service }}</td>
                                        <td>
                                            @foreach($item->personnels as $person)
                                                 {{$person->last_name}}<br>
                                            @endforeach
                                        </td>
                                      @endif
                                        
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