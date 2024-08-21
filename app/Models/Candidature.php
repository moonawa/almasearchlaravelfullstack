<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'selection',
        'rendezvous',
        'recrute', //plus utlisé reponse est utilisé a la place
        'offre_id',
        'candidat_id',
        'decline', //plus utlisé reponse est utilisé a la place
        'heurecandidature',
        'lieu',
        'confirmerv',
        'commentaireviprv',
        'commentaireese',
        'reponese',
        'interlocuteurese_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
    public function offre()
    {
        return $this->belongsTo(Offre::class,'offre_id');
    }
    public function interlocuteurese()
    {
        return $this->belongsTo(Interlocuteurese::class);
    }
}
