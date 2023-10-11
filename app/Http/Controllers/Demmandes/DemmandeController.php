<?php

namespace App\Http\Controllers\demmandes;

use App\Models\Demmandde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;

class demmandeController extends Controller
{
    public function passerDemmande(){
        return view('demmandes.passer_demmandes');
    }
    public function afficheDemmandes(){
        $role = Auth::user()->role_name;
        if ($role=="Directeur" ){
            $data =DB::table('demmanddes')->where('etat_demmande','En attente')->get();
            return view('demmandes.liste_demmandes',compact('data'));
        }
        else if ($role=="Admin" ){
            $data =DB::table('demmanddes')->where('etat_demmande','En attente')->get();
            return view('demmandes.liste_demmandes',compact('data'));
        }
        else if ($role=="Chef de Service" ){
            $data =DB::table('demmanddes')->where('etat_demmande','En attente')->get();
            return view('demmandes.liste_demmandes',compact('data'));
        }
        else{
            $data =DB::table('demmanddes')->where('user_id',Auth::user()->id)->get();
            return view('demmandes.liste_demmandes',compact('data'));
        }
        // $data = DB::table('demmanddes')->where('user_id',Auth::user()->id)->get();
        // return view('demmandes.liste_demmandes',compact('data'));
    }


    public function saveDemmande(request $req){
        $demmande = new Demmandde();
        $demmande->type             = $req->type_demmande;
        $demmande->user_id          = Auth::user()->id;
        $demmande->demandeur       = Auth::user()->name;
        $demmande->lieu             = $req->lieu;
        $file = $req->justification;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $req->justification->move('assets',$filename);

        // $demmande->justification    = $req->justification;
        $demmande->justification = $filename;
        $demmande->etat_demmande    ='En attente';
        $demmande->date_depart      = $req->date_depart;
        $demmande->date_retour      =$req->date_retour;

        $demmande->save();

        Toastr::success('votre demmande est passe avec succes','Success');
        return redirect()->back();
    }

    public function valideDemmande($id,$user_id,$type){
        $update=[
            'etat_demmande' =>'valide',
        ];
        $condition =[
            'user_id' => $user_id,
            'type' =>$type,
            'id'  =>$id,
        ];
        DB::table('demmanddes')->where($condition)->update($update);
        $data = DB::table('personnels')->where('user_id',$user_id)->get();
        $dataDemmande = DB::table('demmanddes')->where($condition)->get();
        return PDF::loadView('demmandes.pdf_demmande',compact('data','dataDemmande'))->download('ordre_mission.pdf');
        // $data = DB::table('demmanddes')->
        // return redirect()->back();
    }
    public function deleteDemmande($id){
        $delete = DB::table('demmanddes')->where('id',$id);
        $delete->delete();
        return redirect()->back();
    }

    public function download(Request $request,$file){
        return response()->download(public_path('assets/'.$file));
    }
}

