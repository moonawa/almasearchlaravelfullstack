<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'ninea',
        'rc',
        'datecreation',
        'situation',
        'user_id',
        'secteuractivite',
        'des'
        
    ];
    public function user() {
        return $this->belongsTo(User::class,'user_id'); 
    }
    public function offres()
    {
        return $this->hasMany(Offre::class,'offre_id');
    }
}
