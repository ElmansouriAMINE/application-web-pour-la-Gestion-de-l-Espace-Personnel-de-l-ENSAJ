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
                        <h2>Affectation de personnels a votre entité de rechetche </h2>
                    </div>
                    <br><br>
                    <div class="card-body">
                        
                        <br/>
                        <br/>
                        
                    <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Entité de recherche</th>
                                        <th>Coordinateur de laboratoire/Equipe</th>
                                        <th>Personnels de l'entité</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($recherches as $item)
                                    <tr>
                                     @if($item->nom!='vide')
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td><a href="{{ url('/recherche/' . $item->id .'/affecter/personnels')}}">{{ $item->nom }}</a></td>
                                        <td>{{ $item->coordinateur }}</td>
                                        <td>
                                            @foreach($item->personnels->where('role','=','Professeur') as $person)
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