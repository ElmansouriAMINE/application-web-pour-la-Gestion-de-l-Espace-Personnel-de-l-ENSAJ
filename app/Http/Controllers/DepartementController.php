<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Personnel;
use Illuminate\Support\Facades\Auth;

class DepartementController extends Controller
{
    
    public function liste()
    {
        $departements = Departement::all();
       
        // dd($departements->first()->personnels);
       return view('departements.liste')->with('departements',$departements);
    }
    public function index()
    {
        $departements = Departement::all();
        return view ('departements.index')->with('departements', $departements);
    }
 
    
    public function create()
    {   
        $data=DB::table('personnels')->where('role','=','Professeur')->orwhere('role','=','Chef de département')->get();
        return view('departements.create',compact('data'));
    }
 
   
    public function store(Request $request)
    {
        $validated=$request->validate([
            'nom'=>'required|unique:departements,nom'
        ]);
        // DB::table('departements')->insertGetId(
        //     ['nom' => 'vide', 'description' => '','chef_de_departement' => 'NULL']
        // );
        
        $input = $request->all();
        Departement::create($input);
        return redirect('departement')->with('flash_message', 'Votre departement est ajoutée avec succès!');  
    }
 
    
    public function show($id)
    {
        $departement = Departement::find($id);
        return view('departements.show')->with('departements', $departement);
    }
 
    
    public function edit($id)
    {
        $data=DB::table('personnels')->where('role','=','Professeur')->orwhere('role','Chef de département')->get();
        $departement = Departement::find($id);
        return view('departements.edit')->with('departements', $departement)->with('data',$data);
    }
    public function enlever_personnel($id){
        
        $departement_selectionner = Departement::find($id);
        $departement=Departement::all();
        $personnels=Personnel::all();
        return view('departements.affectation_de_personnels')->with('departement',$departement)->with('departement_selectionner',$departement_selectionner)->with('personnels',$personnels);


    }

    public function enlever($id){
        $update=[
            'departement_id' => '1',
        ];
        // $departement_selectionner = Departement::find($id)->personnels->id;
        // DB::table('personnels')->where('departement_id','=',$id)->update($update);
        DB::table('personnels')->where('id','=',$id)->update($update);
        return redirect('liste/departement');     //->with('departement_selectionner',$departement_selectionner);
    }

    public function ajouter_personnel_au_departement($id_personnel,$id_departement){
        $departement_selectionner = Departement::find($id_departement);
        $id_departement=$departement_selectionner->id;
        $update=[
            'departement_id' =>''.$id_departement,
        ];
        DB::table('personnels')->where('id','=',$id_personnel)->update($update);
        return redirect('liste/departement');

       

    }
  
    public function update(Request $request, $id)
    {
        $departement = Departement::find($id);
        $input = $request->all();
        $departement->update($input);
        return redirect('departement')->with('flash_message', ' votre departement a été modifiée ');  
    }
    // public function enlever_update(Request $request, $id)
    // {
    //     $departement = Departement::find($id);
    //     $input = $request->departement_id;
    //     $departement->update($input);
    //     return redirect('departement')->with('flash_message', ' votre departement a été modifiée ');  
    // }
   
    public function destroy($id)
    {
        Departement::destroy($id);
        return redirect('departement')->with('flash_message', 'Vote Departement a été supprimée');  
    }

    public function edit_departement($id)
    {
        $data=DB::table('personnels')->where('role','=','Chef de département')->where('departement_id','=',$id)->get();
        $departement = Departement::find($id);
        return view('departements.edit_chef_departement')->with('departements', $departement)->with('data',$data);
    }
    public function show_departement()
    {
        $departement= DB::table('departements')->where('chef_de_departement','=',Auth::user()->name)->get();
        
        return view('departements.dept_chef')->with('departement', $departement);
    }
}

