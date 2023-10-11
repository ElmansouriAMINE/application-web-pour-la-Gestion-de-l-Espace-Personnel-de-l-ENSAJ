<?php

namespace App\Models;

use App\Models\Dossier;
use App\Models\Personnel;
use App\Models\Professeur;
use App\Traits\LockableTrait;
use App\Models\Demmandes\Demmande;
use Illuminate\Notifications\Notifiable;
use App\Models\Dossier\DossierPedagogique;
use App\Models\Dossier\DossierScientifique;
use App\Models\Dossier\DossierAdministratif;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use LockableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'role_name',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Personnel(){
        return $this->hasMany(Personnel::class);
    }


}
