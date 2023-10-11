<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Models\Personnel;

class ServiceController extends Controller
{
    

    public function liste()
    {
        $services = Service::all();
       
        // dd($departements->first()->personnels);
       return view('services.poles_administratifs')->with('services',$services);
    }
    public function index()
    {
        $services = Service::all();
        return view ('services.index')->with('services', $services);
    }
    
    public function create()
    {
        $data=DB::table('personnels')->where('role','=','Professeur')->get();
        return view('services.create',compact('data'));
    }
  
    public function store(Request $request)
    {

        // DB::table('services')->insertGetId(
        //     ['nom' => 'vide', 'description' => '','chef_de_service' => 'NULL']
        // );
        $input = $request->all();
        Service::create($input);
        return redirect('service')->with('flash_message', 'service Addedd!');  
    }
    
    public function show($id)
    {
        $service = Service::find($id);
        return view('services.show')->with('services', $service);
    }
    
    public function edit($id)
    {
        $data=DB::table('personnels')->where('role','=','Professeur')->get();
        $service = Service::find($id);
        return view('services.edit')->with('services', $service)->with('data',$data);
    }
  
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $input = $request->all();
        $service->update($input);
        return redirect('service')->with('flash_message', 'service Updated!');  
    }
  
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('service')->with('flash_message', 'service deleted!');  
    }


    // concernant l'affectation des personnels aux poles administratives + enlever/ajouter un personnel de notre choix 

    public function enlever_personnel($id){
        
        $service_selectionner = Service::find($id);
        $service=Service::all();
        $personnels=Personnel::all();
        return view('services.affectation_des_personnels')->with('service',$service)->with('service_selectionner',$service_selectionner)->with('personnels',$personnels);


    }

    public function enlever($id){
        $update=[
            'service_id' => '1',
        ];
        
        DB::table('personnels')->where('id','=',$id)->update($update);
        return redirect('liste/service');     
    }

    public function ajouter_personnel_au_service($id_personnel,$id_service){
        $service_selectionner = Service::find($id_service);
        $id_service=$service_selectionner->id;
        $update=[
            'service_id' =>''.$id_service,
        ];
        DB::table('personnels')->where('id','=',$id_personnel)->update($update);
        return redirect('liste/service');

       

    }

}
