<?php

namespace App\Models;

use App\Models\Personnels\Personnel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demmandde extends Model
{
    use HasFactory;
    protected $fillable =[
        'type',
        'user_id',
        'demandeur',
        'lieu',
        'justification',
        'etat_demmande',
        'date_depart',
        'date_retour',
        'created_at',
    ];

    public function personnelle(){
       return $this->belongsTo(Personnel::class) ;
    }
}
