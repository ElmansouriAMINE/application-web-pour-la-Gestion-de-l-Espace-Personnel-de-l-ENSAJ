<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telechargement;

class TelechargementController extends Controller
{

    public function index()
    {
        $telechargements = Telechargement::all();
        return view ('telechargements.index')->with('telechargements', $telechargements);
    }
    
    public function create()
    {
        return view('telechargements.create');
    }
  
    public function store(Request $request)
    {

        $telechargement=new Telechargement;
        $telechargement->titre=$request->titre;
        $test= time().'.'.$request->fichier->getClientOriginalExtension();
        $request->fichier->move('assets',$test);
        $telechargement->fichier=$test;
        $telechargement->save();

        return redirect('telechargement')->with('flash_message', 'telechargement Addedd!');  
    }
    
    public function show($id)
    {
        $telechargement = Telechargement::find($id);
        return view('telechargements.show')->with('telechargements', $telechargement);
    }
    
    public function edit($id)
    {
        $telechargement = Telechargement::find($id);
        return view('telechargements.edit')->with('telechargements', $telechargement);
    }
  
    public function update(Request $request, $id)
    {
        $telechargement = Telechargement::find($id);
        // $input = $request->all();
        // $telechargement->update($input);
        $test= time().'.'.$request->fichier->getClientOriginalExtension();
        $request->fichier->move('assets',$test);
        // $input = $request->all();
        $update=[
            'titre'=>$request->titre,
            'fichier'=>$test
            
        ];
        $telechargement->update($update);
        return redirect('telechargement')->with('flash_message', 'telechargement Updated!');  
    }
  
    public function destroy($id)
    {
        Telechargement::destroy($id);
        return redirect('telechargement')->with('flash_message', 'telechargement deleted!');  
    }
    public function download($fichier){
        return response()->download(public_path('assets/'.$fichier));
    }
}
