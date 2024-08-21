<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interlocuteurcbt extends Model
{
    use HasFactory;
    protected $fillable = [
        'fonctioncbt',
        'autrecbt',
        'user_id',
        'cabinet_id',
       
    ];

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id'); 
    }
    public function cabinets()
    {
        return $this->hasMany(Cabinet::class);
    }
    public function propositions()
    {
        return $this->hasMany(Proposition::class,'candidature_id');
    }
}
