<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dossier;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\Dossier\DossierPedagogique;
use App\Models\Dossier\DossierScientifique;
use App\Models\Dossier\DossierAdministratif;

class ProfesseurController extends Controller
{
    //
    public function update_profileProfesseur(request $req){     
        $update = [

            'first_name'            =>$req->first_name,
            'last_name'             =>$req->last_name,
            'birthdate'             =>$req->birthdate,
            'genre'                 =>$req->genre,
            'Registration_number'   =>$req->Registration_number,
            'Department'            =>$req->Department,
            'sector'                =>$req->sector,
            'number_phone'          =>$req->number_phone,
            'city'                  =>$req->city,
            'state'                 =>$req->state,
            'zip_code'              =>$req->zip_code,
            'full_address'          =>$req->full_address,
        ];
        DB::table('professeurs')->where('user_id',Auth::user()->id)->update($update);
            Toastr::success('Create new account successfully ','Success');
            return redirect()->route('userManagement');
    }

    public function viewDetailProfesseur($id)
    {  
        // if (Auth::user()->role_name=='Admin')
        // {
            $data = DB::table('professeurs')->where('id',$id)->get();
            return view('usermanagement.edit_profile',compact('data'));
        // }
        // else
        // {
        //     return redirect()->route('home');
        // }
    }

    public function SuivreDossierPedagogique(){
        if (Auth::user()->role_name=='Admin'){
            $data = DB::table('dossier_pedagogiques')->get();
            return view('Etat_dossier.etat_dossier_pedagogique',compact('data'));
        }
        else{
             $data = DB::table('dossier_pedagogiques')->where('user_id',Auth::user()->id)->get();
        return view('Etat_dossier.etat_dossier_pedagogique',compact('data'));
        }
       
    }

    public function SuivreDossierScientifique(){
        if (Auth::user()->role_name=='Admin'){
            $data = DB::table('dossier_scientifiques')->get();
            return view('Etat_dossier.etat_dossier_pedagogique',compact('data'));
        }
        else{
        $data = DB::table('dossier_scientifiques')->where('user_id',Auth::user()->id)->get();
        return view('Etat_dossier.etat_dossier_scientifique',compact('data'));
        }
    }
    public function SuivreDossierAdministratif(){
        if (Auth::user()->role_name=='Admin'){
            $data = DB::table('dossier_administratif')->get();
            return view('Etat_dossier.etat_dossier_administratif',compact('data'));
        }
        else{
             $data = DB::table('dossier_administratif')->where('user_id',Auth::user()->id)->get();
        return view('Etat_dossier.etat_dossier_administratif',compact('data'));
        }
       
    }
}