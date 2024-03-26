<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomcompetence',
        'niveaucompetence',
        'candidat_id'
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
}
