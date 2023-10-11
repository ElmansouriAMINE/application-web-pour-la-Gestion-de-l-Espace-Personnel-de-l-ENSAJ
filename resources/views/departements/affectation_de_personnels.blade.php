@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')


<link rel="stylesheet" href="{{URL::to('assets/css/affectation.css')}}">


<div class="card" style="margin-left:300px;">
  <div class="card-header">Page de Modification/affectation de personnels</div>
  <div class="card-body">
      
  {!! csrf_field() !!}
        @method("PATCH")
       
        <h1><label>Gestion de la departement : {{$departement_selectionner->nom}}</label></br></h1>
        </br></br></br></br></br></br><hr><hr>
        <!-- <label>personnels actuels</label></br></br> -->
        <!-- <select name="" id="">
        @foreach($departement_selectionner->personnels->where('role','=','Professeur') as $person)
         <option value=""><label >
            
                    {{$person->last_name}}<br>
            
        </label></option>
        @endforeach
        </select> -->


        <div class="conteneur">
        <div class="gauche">
            <h3><label>personnels actuels</label></h3></br></br>
            <div class="dropdown">
                  <button onclick="myFunction1()" class="dropbtn">Supprimer un professeur</button>
                    <div id="myDropdown1" class="dropdown-content">
                    @foreach($departement_selectionner->personnels->where('role','=','Professeur') as $person)
                      <a href="{{ url('/personne/departement/enlevee/' . $person->id)}}">{{$person->last_name}}</a>
                      
                    @endforeach
                    </div>
            </div>
        
        </div>
        <div class="droit">
            <h3><label>personnels potentiels</label></h3></br></br>
            <div class="dropdown">
                  <button onclick="myFunction2()" class="dropbtn">ajouter un professeur</button>
                    <div id="myDropdown2" class="dropdown-content">
                    @foreach($personnels->where('role','=','Professeur') as $person)
                      <a class="dropdown-item" href="{{ url('/personne/ajoutee/'.$person->id.'/au/departement/'.$departement_selectionner->id)}}"> {{$person->last_name}}</a><br>
                    @endforeach
                    </div>
            </div>
               

        </div>
        
        </br></br></br></br></br><hr><hr>
        
                  <!-- <div class="dropdown">
                  <button onclick="myFunction1()" class="dropbtn">Supprimer un professeur</button>
                    <div id="myDropdown1" class="dropdown-content">
                    @foreach($departement_selectionner->personnels->where('role','=','Professeur') as $person)
                      <a href="{{ url('/personne/enlevee/' . $person->id)}}">{{$person->last_name}}</a>
                    @endforeach
                    </div>
                  </div> -->

            
                <!-- affecter un personnel au departement  -->

                <!-- </br></br></br></br></br></br><hr><hr>
        <label>personnels potentiels</label></br></br>
      
        </br></br></br></br></br><hr><hr> -->
        

               <!-- <div class="dropdown">
                  <button onclick="myFunction2()" class="dropbtn">ajouter un professeur</button>
                    <div id="myDropdown2" class="dropdown-content">
                    @foreach($personnels->where('role','=','Professeur') as $person)
                      <a class="dropdown-item" href="{{ url('/personne/ajoutee/'.$person->id.'/au/departement/'.$departement_selectionner->id)}}"> {{$person->last_name}}</a><br>
                    @endforeach
                    </div>
               </div>
                -->
               
       
  </div>
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 
@endsection