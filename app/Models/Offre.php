<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nomposte',
        'description',
        'nombredeposte',
        'annexperience',
        'salaire',
        'datedebut',
        'lieu',
        'typecontrat',
        'datecloture',
        'statusoffre',
        'statuscabinet',
        'entreprise_id',
        'competenceoffre',
        'typeeoffre', //avantage
        'fiche'
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class,'entreprise_id');
    }
    public function candidatures()
    {
        return $this->hasMany(Candidature::class,'candidature_id');
    }
    public function propositions()
    {
        return $this->hasMany(Proposition::class,'proposition_id');
    }
}
