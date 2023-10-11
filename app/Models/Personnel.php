<?php

namespace App\Models;

use App\Models\User;
use App\Models\Demmandes\Demmande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
        'role',
        'last_name',
        'user_id',
        'picture'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function demmandes(){
        return $this->hasMany(Demmande::class);
    }
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
    public function recherche(){
        return $this->belongsTo(Recherche::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
}
