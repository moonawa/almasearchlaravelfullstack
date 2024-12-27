<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutresDiplomes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomautre',
        'autrediplome',
        'candidat_id',
       
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
}
