<?php

namespace App\Http\Controllers;
use App\Models\Recherche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Personnel;

class RechercheController extends Controller
{
    public function index()
    {
        $recherches = Recherche::all();
        return view ('recherches.index')->with('recherches', $recherches);
    }
    
    public function create()
    {
        $data=DB::table('personnels')->where('role','=','Professeur')->get();
        return view('recherches.create',compact('data'));
    }
  
    public function store(Request $request)
    {
        // DB::table('recherches')->insertGetId(
        //     ['nom' => 'vide', 'description' => '','coordinateur' => 'NULL']
        // );
        $input = $request->all();
        recherche::create($input);
        return redirect('recherche')->with('flash_message', 'recherche Addedd!');  
    }
    
    public function show($id)
    {
        $recherche = Recherche::find($id);
        return view('recherches.show')->with('recherches', $recherche);
    }
    
    public function edit($id)
    {
        $data=DB::table('personnels')->where('role','=','Professeur')->get();
        $recherche = Recherche::find($id);
        return view('recherches.edit')->with('recherches', $recherche)->with('data', $data);
    }
  
    public function update(Request $request, $id)
    {
        $recherche = Recherche::find($id);
        $input = $request->all();
        $recherche->update($input);
        return redirect('recherche')->with('flash_message', 'recherche Updated!');  
    }
  
    public function destroy($id)
    {
        Recherche::destroy($id);
        return redirect('recherche')->with('flash_message', 'recherche deleted!');  
    }
    public function liste()
    {
        $recherches = Recherche::all();
       
        // dd($departements->first()->personnels);
       return view('recherches.liste')->with('recherches',$recherches);
    }

    public function enlever_personnel($id){
        
        $recherche_selectionner = Recherche::find($id);
        $recherche=Recherche::all();
        $personnels=Personnel::all();
        return view('recherches.affectationRecherche')->with('recherche',$recherche)->with('recherche_selectionner',$recherche_selectionner)->with('personnels',$personnels);


    }

    public function enlever($id){
        $update=[
            'recherche_id' => '1',
        ];
        
        DB::table('personnels')->where('id','=',$id)->update($update);
        return redirect('liste/recherche');     
    }

    public function ajouter_personnel_au_recherche($id_personnel,$id_recherche){
        $recherche_selectionner = Recherche::find($id_recherche);
        $id_recherche=$recherche_selectionner->id;
        $update=[
            'recherche_id' =>''.$id_recherche,
        ];
        DB::table('personnels')->where('id','=',$id_personnel)->update($update);
        return redirect('liste/recherche');

       

    }
  

}
