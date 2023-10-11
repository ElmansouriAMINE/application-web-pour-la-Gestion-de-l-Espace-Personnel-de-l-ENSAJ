<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recherche extends Model
{
    protected $table = 'recherches';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'description', 'coordinateur'];

    public function personnels(){
        return $this->hasMany(Personnel::class);
    }
}
