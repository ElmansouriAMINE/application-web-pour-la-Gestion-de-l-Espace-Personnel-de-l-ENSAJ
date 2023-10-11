<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FiliereController extends Controller
{
    
    public function index()
    {
        $filieres = Filiere::all();
        return view ('filieres.index')->with('filieres', $filieres);
    }
 
    
    public function create()
    {   
        $data=DB::table('personnels')->where('role','Professeur')->get();
        $departement_data=DB::table('departements')->get();
        return view('filieres.create',compact(['departement_data','data']));
       
    }
 
   
    public function store(Request $request)
    {
        // DB::table('filieres')->insertGetId(
        //      ['nom' => 'vide', 'description' => '','coordinateur' => 'NULL']
        //  );
        $input = $request->all();
        Filiere::create($input);
        
        return redirect('filiere')->with('flash_message', 'Votre Filiere est ajoutée avec succès!');  
    }
 
    
    public function show($id)
    {
        $filiere = Filiere::find($id);
        return view('filieres.show')->with('filieres', $filiere);
    }
 
    
    public function edit($id)
    {
        $data=DB::table('personnels')->where('role','=','Professeur')->orwhere('role','Chef de département')->get();
        $filiere = Filiere::find($id);
        return view('filieres.edit')->with('filieres', $filiere)->with('data',$data);
    }
 
  
    public function update(Request $request, $id)
    {
        $filiere = Filiere::find($id);
        $input = $request->all();
        $filiere->update($input);
        return redirect('filiere')->with('flash_message', 'votre filiere a été modifiée');  
    }
 
   
    public function destroy($id)
    {
        Filiere::destroy($id);
        return redirect('filiere')->with('flash_message', 'Votre Filiere a été supprimée');  
    }
    public function edit_filiere($id)
    {
        // $data=DB::table('personnels')->where('role','=','Chef de filière')->where('filiere_id','=',$id)->get();
        $filiere = Filiere::find($id);
        // $filiere= DB::table('filieres')->where('coordinateur','=',Auth::user()->name)->get();

        return view('filieres.coordinateur_filiere')->with('filieres', $filiere);
        
        // ->with('data',$data);
    }
    public function show_filiere()
    {
        $filiere= DB::table('filieres')->where('coordinateur','=',Auth::user()->name)->get();
        
        return view('filieres.filiere_chef')->with('filiere', $filiere);
    }
}

