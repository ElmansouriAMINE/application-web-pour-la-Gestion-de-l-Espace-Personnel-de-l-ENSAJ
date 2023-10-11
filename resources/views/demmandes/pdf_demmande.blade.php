<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/sass/css.scss">
    <title>Document</title>
    <style>
        header p {
    position: relative;
    margin-top: -90px;
    margin-left: -40px;
    text-align: center;
}


#fin {
    position: relative;
    margin-left: 570px;
    margin-top: -116px;
    width: 100px;
    height: 100px;
}

#titre {
    position: relative;
    margin-left: 140px;
    margin-top: 50px;
    width: 500px;
    height: 40px;
    text-align: center;
    background-color: rgba(49, 44, 44, 0.123);
}

#attestation {
    position: relative;
    margin-left: 60px;
}



#signature {
    position: relative;
    margin-left: 350px;
}

footer {
    text-align: center;
    font-style: oblique;
    font-size: large;
    position: relative;
    margin-top: 180px;
}
#txt{
    line-height: 2em;
}
    </style>
</head>

<body>
    <header>
        <img src="{{public_path('images/téléchargement.png')}}" alt="" width="100px" height="100px">
        <p>UNIVERSITE CHOUAIB DOUKKALI <br>ECOLE NATIONALE DES SCIENCES <br> APPLIQUEES D'ELJADIDA</p><br>
        <img id="fin" src="{{public_path('images/téléchargement.png')}}" >
    </header>
    <hr>
    <div class="container">
        <div id="titre">
            <h1>ORDRE DE MISSION</h1>
        </div>
        @foreach($data as $key =>$item)
        @foreach($dataDemmande as $key1 => $item1)
        <div id="attestation">
            <br><br>
            <p id="txt">M. <strong style="text-transform: uppercase;">{{$item->last_name}} {{$item->first_name}}</strong> 
            Fonction dans l’établissement : l'Ecole National des Sciences Appliquées d'El Jadida,
            est autorisé à se rendre, de <strong>{{$item1->date_depart}}</strong> jusqu'à <strong>{{$item1->date_retour}}</strong>
            à : <strong>{{$item1->lieu}}</strong> Pour la mission suivante : <strong>{{$item1->type}}</strong></p>

            
            <p id="signature">Fait à El Jadida,{{$item->created_at}}</p><br><br><br><br><br><br><br><br><br>
        </div>
        @endforeach
        @endforeach
    </div>
    <br><br>
 
    <footer>
           <hr>
        <strong><p>Route Nationale N°1 (Route AZEMMOUR),Km6,HAOUZIA <br> BP:5096 ElJadida Plateau 24002 <br> Téléphone:0523 39 56 79-0523 34 48 22 /fax :0523 39 49 15</p></strong>
        
    </footer>
</body>
</html>