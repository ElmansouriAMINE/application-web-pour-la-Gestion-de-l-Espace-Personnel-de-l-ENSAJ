@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<h4 style="margin-left: 600px;">Liste des Personnels</h4>
<link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}">
<table class="table-style" style="margin-left: 300px;">

        <thead>
        <th scope="col">Nom</th>
                <th scope="col">prenom</th>
                <th scope="col">email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Date D'embauche</th>
                <th scope="col">Ville</th>           
                <th scope="col">Adresse</th>
        </thead>
        

        <tbody>
        @foreach($data as $key => $item)
            <tr>
                <td>{{$item->last_name}}</td>
                <td>{{$item->first_name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->number_phone}}</td>
                <td>{{$item->date_embauche}}</td>
                <td>{{$item->city}}</td>
                <td>{{$item->full_address}}</td>
            </tr>
        </tbody>
        @endforeach

    </table>

@endsection