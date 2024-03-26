<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomformation',
        'etablissementformation',
        'datedebutformation',
        'datefinformation',
        'anneeacademique',
        'niveauformation',
        'candidat_id'
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
}
