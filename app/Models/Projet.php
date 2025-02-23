<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
      'nom',
      'date_debut',
      'date_fin',
      'duree',
      'description',
      'statut_id',
       'departement_id',
       'user_id'

      
  ];

    public function user(){
       return $this->belongsTo(User::class,"user_id","id"); 
    }

    public function departement(){
        return $this->belongsTo(Departement::class,"departement_id","id");
 
     }

     public function tache(){
        return $this->hasMany(Tache::class,"tache_id","id");
 
     }

     public function statut(){
        return $this->belongsTo(Statut::class,"statut_id","id");
 
     }
}
