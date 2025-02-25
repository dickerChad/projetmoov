<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable= [
        'nom',
        'dateDebut',
        'dateFin',
        'valeur',
        'Estrealisee',
         'projet_id'
        ];
    public function proje(){
        return $this->belongsTo(Projet::class);
    }
}
