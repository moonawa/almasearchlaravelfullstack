<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'fonction',   
        'residence',
        'birthday', 
        'genre', 
        'situationmatrimonaile',
        'handicap',
        'permisconduire',
        'accroche',
        'disponibilite',
        'nationnalite',
        'lieudemobilite',
        'cv',
        'motivation',
        'user_id',
        'cabinet_id',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id'); 
    }
    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class,'cabinet_id');
    }

    public function langues()
    {
        return $this->hasMany(Langue::class,'candidat_id');
    }
    public function competences()
    {
        return $this->hasMany(Competence::class,'candidat_id');
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class,'candidat_id');
    }
    public function formations()
    {
        return $this->hasMany(Formation::class,'candidat_id');
    }
    public function references()
    {
        return $this->hasMany(Reference::class,'candidat_id');
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
