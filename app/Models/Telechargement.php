<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telechargement extends Model
{
    protected $table = 'telechargements';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'fichier'];
}
