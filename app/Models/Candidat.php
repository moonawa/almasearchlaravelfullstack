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
        'lieudemobilite', //Pays de Résidence
        'cv',
        'motivation',
        'user_id',
        'cabinet_id',
        'secteuractivitecandidat',
        'trancheanneeexpeience',
        'tranchesalariale',
        'vip',
        'motcle',

        'cni',
        'passeport',
        'casier',
        
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
    public function mot_cles()
    {
        return $this->hasMany(MotCle::class, 'candidat_id');
    }
    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
    public function propositions()
    {
        return $this->hasMany(Proposition::class);
    }
    public function latestFormation()
    {
        return $this->hasOne(Formation::class)->orderBy('anneeacademique', 'desc');
    }
    public function isCvComplete()
    {
        

        // Vérifiez qu'il y a au moins une expérience, une compétence, une langue et une formation
        if ($this->experiences()->count() == 0 || 
            $this->competences()->count() == 0 || 
            $this->langues()->count() == 0 || 
            $this->formations()->count() == 0) {
            return false;
        }

        return true;
    }

    public function licences()
    {
        return $this->hasMany(Licence::class);
    }
    public function masters()
    {
        return $this->hasMany(Master::class);
    }
    public function doctorats()
    {
        return $this->hasMany(Doctorat::class);
    }
    public function attestionbacs()
    {
        return $this->hasMany(AttestionBac::class);
    }
    public function autresdiplomes()
    {
        return $this->hasMany(AutresDiplomes::class);
    }
    public function certificats()
    {
        return $this->hasMany(Certificat::class);
    }
}
