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
        'recrute',
        'offre_id',
        'candidat_id',
        'decline',
        'heurecandidature',
        'lieu',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
    public function offre()
    {
        return $this->belongsTo(Offre::class,'offre_id');
    }
}
