<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nineacabinet',
        'rccabinet',
        'datecreationcabinet',
        'situationcabinet',
 
        'secteuractivitecabinet',
        'descabinet',
        'telcbt',
        'emailcbt',
        'nomcabinet',
        'logocbt'
    ];
    public function user() {
        return $this->belongsTo(User::class,'user_id'); 
    }
  
    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }
    public function interlocuteurcbts()
    {
        return $this->hasMany(Interlocuteurcbt::class);
    }
}
