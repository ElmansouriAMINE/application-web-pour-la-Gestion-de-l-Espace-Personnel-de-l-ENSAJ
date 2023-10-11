<?php

namespace App\Http\Controllers\statistiques;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatistiqueController extends Controller
{
    public function index(){
        $list = array();
        for($i=1;$i<=12;$i++){
            $data = DB::table('attestations')->whereMonth('created_at','=',$i)->count();
            $data = intval($data);
            array_push($list,$data);
        }

        $list1 = array();
        for($i=1;$i<=12;$i++){
            $lista = array();
            $travail = DB::table('attestations')->whereMonth('created_at','=',$i)->where('type',"attestation de travail")->count();
            $salaire = DB::table('attestations')->whereMonth('created_at','=',$i)->where('type',"attestation de salaire")->count();
            $travail = intval($travail);
            $salaire = intval($salaire);
            array_push($lista,$travail,$salaire);
            array_push($list1,$lista);
        }

        $attente    = DB::table('attestations')->where('etat_attestation',"En attente")->count();
        $valide     = DB::table('attestations')->where('etat_attestation',"valide")->count();

        $male       = DB::table('personnels')->where('genre','male')->get()->count();
        $femelle    = DB::table('personnels')->where('genre','femalle')->get()->count();
        $salaire    = DB::table('attestations')->where('type','attestation de salaire')->get()->count();
        return view('statistiques.index',compact('list','list1','valide','attente','male','femelle'));

    }
}
