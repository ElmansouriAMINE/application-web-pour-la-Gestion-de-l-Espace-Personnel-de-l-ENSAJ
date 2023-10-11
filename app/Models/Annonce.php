<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table = 'annonces';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'contenu', 'fichier'];

   
}
