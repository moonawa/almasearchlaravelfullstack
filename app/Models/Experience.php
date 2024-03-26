<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrepriseexperience',
        'missionexperience',
        'posteexperience',
        'datedebutexperience',
        'datefinexperience',
        'candidat_id'
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
}
