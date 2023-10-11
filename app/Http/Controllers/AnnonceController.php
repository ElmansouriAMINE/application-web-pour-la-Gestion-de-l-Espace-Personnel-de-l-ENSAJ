<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Notification;

use App\Models\User;
use App\Notifications\Annoce_cree;

class AnnonceController extends Controller
{

    // public $nbr=0;
    public function index()
    {
        $annonces = Annonce::all();
        return view ('annonces.index')->with('annonces', $annonces);
    }
    
    public function create()
    {
        return view('annonces.create');
    }
  
    public function store(Request $request)
    {
        // $msg="";
        // $input = $request->all();
        // Annonce::create($input);
        
        $annonce=new Annonce;
        $annonce->titre=$request->titre;
        $annonce->contenu=$request->contenu;

        $test= time().'.'.$request->fichier->getClientOriginalExtension();
        $request->fichier->move('assets',$test);
        $annonce->fichier=$test;

        $annonce->user_id=Auth::user()->id;
        if($annonce->save()){
            $user=User::all();
            Notification::send($user , new Annoce_cree($annonce));
        }
        session()->flash('success','Cet annonce a ete enregistre par succes');
        
        // $msg ="Il y a un Nouveau annonce!!<br>";

        return redirect('annonce')->with('flash_message', 'annonce Addedd!');    
        // ->with('msg',$msg);  
    }
    
    public function show($id)
    {
        $annonce = Annonce::find($id);
        return view('annonces.show')->with('annonces', $annonce);
    }
    
    public function edit($id)
    {
        $annonce = Annonce::find($id);
        return view('annonces.edit')->with('annonces', $annonce);
    }
  
    public function update(Request $request, $id)
    { 
        $annonce = Annonce::find($id);
        $test= time().'.'.$request->fichier->getClientOriginalExtension();
        $request->fichier->move('assets',$test);
        // $input = $request->all();
        $update=[
            'titre'=>$request->titre,
            'contenu'=>$request->contenu,
            'fichier'=>$test
            
        ];
        $annonce->update($update);
        return redirect('annonce')->with('flash_message', 'annonce Updated!');  
    }
  
    public function destroy($id)
    {
        Annonce::destroy($id);
        return redirect('annonce')->with('flash_message', 'annonce deleted!');  
    }

    public function download($fichier){
        return response()->download(public_path('assets/'.$fichier));
    }
}
