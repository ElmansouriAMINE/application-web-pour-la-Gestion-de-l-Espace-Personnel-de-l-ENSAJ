<?php

namespace App\Http\Controllers\Personnels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PersonnelController extends Controller
{

    public function infoPersonnel(){
        $data = DB::table('personnels')->where('user_id',Auth::user()->id)->get();
            return view('usermanagement.edit_profile',compact('data'));
    }
    public function updateProfile(request $req){
        if(Auth::user()->avatar ="photo_defaults.png"){
            if($req->image_user !=""){
                $image = time().'.'.$req->image_user->extension();  
                $req->image_user->move(public_path('images'), $image);
                $update_image_user= [
                    'avatar' =>$image,
                ];
                DB::table('users')->where('id',Auth::user()->id)->update($update_image_user);
                }
            else{
                $image = "photo_defaults.png";
            }
        }


        $update = [
            'first_name'            =>$req->first_name,
            'last_name'             =>$req->last_name,
            'birthdate'             =>$req->birthdate,
            'cin'                   =>$req->cin,
            'salaire'               =>$req->salaire,
            'genre'                 =>$req->genre,
            // 'picture'               =>$image,
            'Registration_number'   =>$req->Registration_number,
            'Department'            =>$req->Department,
            'sector'                =>$req->sector,
            'number_phone'          =>$req->number_phone,
            'city'                  =>$req->city,
            'state'                 =>$req->state,
            'zip_code'              =>$req->zip_code,
            'full_address'          =>$req->full_address,
        ];
    
    // else{
    //     $update = [
    //         'first_name'            =>$req->first_name,
    //         'last_name'             =>$req->last_name,
    //         'birthdate'             =>$req->birthdate,            
    //         'cin'                   =>$req->cin,
    //         'salaire'               =>$req->salaire,
    //         'genre'                 =>$req->genre,
    //         'Registration_number'   =>$req->Registration_number,
    //         'Department'            =>$req->Department,
    //         'sector'                =>$req->sector,
    //         'number_phone'          =>$req->number_phone,
    //         'city'                  =>$req->city,
    //         'state'                 =>$req->state,
    //         'zip_code'              =>$req->zip_code,
    //         'full_address'          =>$req->full_address,
    //     ];
    // }

        DB::table('personnels')->where('user_id',Auth::user()->id)->update($update);
        return redirect()->back();
    }
    public function liste_personnel(){
        $data = DB::table('personnels')->where('role','<>','Directeur')->get();
        return view('personnels.liste_personnels',compact('data'));
    }
}
