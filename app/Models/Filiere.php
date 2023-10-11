<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
   
    protected $table = 'filieres';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'nom_complet', 'description','departement','coordinateur'];
    public function personnels(){
        return $this->hasMany(Personnel::class);
    }
}

