<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    use HasFactory;

    protected $fillable = [
        'selectionproposition',
        'rendezvousproposition',
        'recruteproposition',
        'offre_id',
        'candidat_id',
        'heureproposition',
        'lieuproposition',
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
