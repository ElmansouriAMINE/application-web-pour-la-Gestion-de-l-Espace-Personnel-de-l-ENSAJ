@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')

<script src="/resources/js/liste_derolante.js"> </script>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}


/* css pour diviser l'ecran en deux parties */

.conteneur{
  /* border:15px ridge grey; */
  display:flex;
  flex-direction: row;
  height:400px;
}

.gauche {
  /* border:5px ridge blue; */
  flex:1;
  text-align:center;
}
h1{
  text-align:center;
}
 
.droit {
  /* border:5px ridge red; */
  flex:1;
  text-align:center;
}


/* end  */


</style>

<div class="card" style="margin-left:300px;">
  <div class="card-header">Page de Modification/affectation de personnels au service convenable </div>
  <div class="card-body">
      
  {!! csrf_field() !!}
        @method("PATCH")
       
        <h1><label>Gestion de : {{$service_selectionner->nom}}</label></br></h1>
        </br></br></br></br></br></br><hr><hr>
      
     <div class="conteneur">
        <div class="gauche">
            <h3><label>personnels actuels</label></h3></br></br>
            <div class="dropdown">
                  <button onclick="myFunction1()" class="dropbtn">Enlever un personnel</button>
                    <div id="myDropdown1" class="dropdown-content">
                    @foreach($service_selectionner->personnels as $person)
                      <a href="{{ url('/personne/enlevee/' . $person->id)}}">{{$person->last_name}}</a>
                    @endforeach
                    </div>
            </div>
        
        </div>
        <div class="droit">
            <h3><label>personnels potentiels</label></h3></br></br>
            <div class="dropdown">
                  <button onclick="myFunction2()" class="dropbtn">ajouter un personnel</button>
                    <div id="myDropdown2" class="dropdown-content">
                    @foreach($personnels as $person)
                      <a class="dropdown-item" href="{{ url('/personne/ajoutee/'.$person->id.'/au/service/'.$service_selectionner->id)}}"> {{$person->last_name}}</a><br>
                    @endforeach
                    </div>
            </div>
               

        </div>
        
        </br></br></br></br></br><hr><hr>
        
                  
               
               </div>
               
               
       
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
