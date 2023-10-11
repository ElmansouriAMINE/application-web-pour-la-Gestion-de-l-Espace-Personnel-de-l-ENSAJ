@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<head>
<script>
	function chart(){
    var type = document.getElementById('typeChar').value;
	var chart = new CanvasJS.Chart("chartContaine", {
	animationEnabled: true,
	title: {
		text: ""
	},
	data: [{
		type: type,
		startAngle: 240,
		yValueFormatString: "##0.00\%",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: ({{$valide}})/({{$attente}}+{{$valide}}), label: "traitées"},
			{y: ({{$attente}})/({{$attente}}+{{$valide}}), label: "non traitées"}
		]
	}]
});
chart.render();

}
</script>
<script>
function myFunction() {
    var type = document.getElementById('typeChart').value;

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: ""
	},
	data: [{
		type: type,
		startAngle: 240,
		yValueFormatString: "##0.00\%",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: ({{$male}})/({{$male}}+{{$femelle}}), label: "male"},
			{y: ({{$femelle}})/({{$male}}+{{$femelle}}), label: "femalle"}
		]
	}]
});
chart.render();

}
</script>
<script>

function attestations(){
    var type = document.getElementById('typeChartt').value;
	
	var chart = new CanvasJS.Chart("chartContainerr",{
		animationEnabled: true,
	title: {
		text: ""
	},
	data: [{
		type: type,
		startAngle: 240,
		yValueFormatString: "##",
		indexLabel: "",
		dataPoints: [
			{y: {{$list[0]}}, label: "janvier"},
			{y: {{$list[1]}}, label: "février"},
			{y: {{$list[2]}}, label: "mars"},
			{y: {{$list[3]}}, label: "Avril"},
			{y: {{$list[4]}}, label: "Mai"},
			{y: {{$list[5]}}, label: "juin"},
			{y: {{$list[6]}}, label: "juillet"},
			{y: {{$list[7]}}, label: "août"},
			{y: {{$list[8]}}, label: "septembre"},
			{y: {{$list[9]}}, label: "octobre"},
			{y: {{$list[10]}}, label: "novembre "},
			{y: {{$list[11]}}, label: "décembre"},


		]
	}]
	});
	chart.render();
}


function test(){
	var t = document.getElementById('typeCharttt').value;
	var s = document.getElementById('typeChartttt').value;
	var ctx = document.getElementById("chartContainerrr");
var chart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["janvier", "février", "mars", "Avril", "Mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
    datasets: [
      {
        type: t,
        backgroundColor: "rgba(0, 0, 255, 1)",
        borderColor: "rgba(0, 0, 255, 1)",
        borderWidth: 1,
        label: "de Travail",
        data: [{{$list1[0][0]}},{{$list1[1][0]}},{{$list1[2][0]}},{{$list1[3][0]}},{{$list1[4][0]}},{{$list1[5][0]}},{{$list1[6][0]}},{{$list1[7][0]}},{{$list1[8][0]}},{{$list1[9][0]}},{{$list1[10][0]}},{{$list1[11][0]}}]
      },
      {
        type: s,
        label: "de Salaire",
		backgroundColor: "rgba(0, 255, 0, 1)",
        borderColor: "rgba(0, 0, 255, 1)",
        data: [{{$list1[0][1]}},{{$list1[1][1]}},{{$list1[2][1]}},{{$list1[3][1]}},{{$list1[4][1]}},{{$list1[5][1]}},{{$list1[6][1]}},{{$list1[7][1]}},{{$list1[8][1]}},{{$list1[9][1]}},{{$list1[10][1]}},{{$list1[11][1]}}]
        
      }
    ]
  }
});


}


</script>
</head>
<body>
	
    <h2 style="text-align:center;margin-top:20px;text-decoration:underline">Les Statistiques de notre Espace </h2>
    <div style="height: 300px; width: 500px; margin-left:1000px;margin-top:40px">
        <h4 style="color: black; text-decoration:underline">pourcentage des hommes et des femmes présents dans cet Espace</h4>
        <select name="typeChart" id="typeChart" onchange="myFunction()">
            <option value="pie">pie</option>
            <option value="column">column</option>
            <option value="bar">Bar</option>
            <option value="line">line</option>
        </select>
        <div id="chartContainer" ></div>
    </div>

	<div style="height: 300px; width: 500px; margin-left:310px;margin-top:-300px">
		<h4 style="color: black; text-decoration:underline">les attestations demandées par mois</h4><br>
		<select name="typeChartt" id="typeChartt" onchange="attestations()">
            <option value="pie">pie</option>
            <option value="column">column</option>
            <option value="bar">Bar</option>
            <option value="line">line</option>
        </select>
		<div id="chartContainerr"></div>
	</div>


	<div style="height: 300px; width: 500px; margin-left:310px;margin-top:200px">
	<hr>
		<h4 style="color: black; text-decoration:underline">Chaque type des attestations demandées par mois</h4>
		<select name="typeCharttt" id="typeCharttt" onchange="test()">
			<option value="" disabled selected>pour travail</option>
            <option value="bar">Bar</option>
            <option value="line">line</option>
        </select>
		<select name="typeChartttt" id="typeChartttt" onchange="test()">
			<option value="" disabled selected>pour salaire</option>
            <option value="bar">Bar</option>
            <option value="line">line</option>
        </select>
		<canvas id="chartContainerrr" width="600px" height="400px"></canvas>
	</div>

	<div style="height: 300px; width: 500px; margin-left:1000px;margin-top:-315px">
	<hr>
        <h4 style="color: black; text-decoration:underline">pourcentage des attestations traitées et non traitées</h4>
        <select name="typeChar" id="typeChar" onchange="chart()">
		<option value="column">column</option>
            <option value="pie">pie</option>
            <option value="bar">Bar</option>
            <option value="line">line</option>
        </select>
        <div id="chartContaine" ></div>
    </div>

	



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>


@endsection
