<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorat extends Model
{
    use HasFactory;
    protected $fillable = [
        'licence',
        'candidat_id',
       
    ];

    public function doctorat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
}
