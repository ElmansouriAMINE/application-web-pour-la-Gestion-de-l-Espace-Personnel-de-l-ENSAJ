<?php

namespace App\Http\Controllers\Attestations;

use App\Models\Attestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Traits\Timestamp;
class AttestationController extends Controller
{
    
    public function demmanderAttestation(){
            return view('attestations.demmander_attestation');

    }
    public function saveAttestation(request $req){
        $attestation = new Attestation;
        $attestation->type              = $req->type_attestation;
        // $attestation->file              = 
        $attestation->user_id           = Auth::user()->id;
        $attestation->demandeur        = Auth::user()->name;
        $attestation->etat_attestation  = "En attente";

        $attestation->save();
        return redirect()->route('home');
    }

    public function afficheAttestation(){
        $role = Auth::user()->role_name;
        if ($role=="Ressources humaines" ){
            $data =DB::table('attestations')->where('etat_attestation','En attente')->get();
            return view('attestations.liste_attestations',compact('data'));
        }
        else if ($role=="Admin" ){
            $data =DB::table('attestations')->where('etat_attestation','En attente')->get();
            return view('attestations.liste_attestations',compact('data'));
        }
        else{
            $data =DB::table('attestations')->where('user_id',Auth::user()->id)->get();
            return view('attestations.liste_attestations',compact('data'));
        }
    }
    public function valideAttestation($id,$user_id,$type){
        if($type == "attestation de travail"){
            $update=[
                'etat_attestation' =>'valide',
            ];
            $condition = [
                'user_id' => $user_id,
                'type'    => $type,
                'id'      =>$id,
        ];
           DB::table('attestations')->where($condition)->update($update);
        $data = DB::table('personnels')->where('user_id',$user_id)->get();
        return  PDF::loadView('attestations.att_de_travail',compact('data'))->download('attestation.pdf');
        }
        else if($type == "attestation de salaire"){
            $update=[
                'etat_attestation' =>'valide',
            ];
            $condition = [
                'user_id' => $user_id,
                'type'    => $type,
        ];
           DB::table('attestations')->where($condition)->update($update);
        $data = DB::table('personnels')->where('user_id',$user_id)->get();
        return  PDF::loadView('attestations.att_de_salaire',compact('data'))->download('attestation.pdf');
        }

    }
}
