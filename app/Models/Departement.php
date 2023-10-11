<?php

namespace App\Models;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = 'departements';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'description', 'chef_de_departement'];

    public function personnels(){
        return $this->hasMany(Personnel::class);
    }

}
