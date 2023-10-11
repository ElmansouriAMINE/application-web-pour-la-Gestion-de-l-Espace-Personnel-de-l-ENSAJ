<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'description','chef_de_service'];

    public function personnels(){
        return $this->hasMany(Personnel::class);
    }
}
