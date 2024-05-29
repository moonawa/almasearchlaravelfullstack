<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interlocuteurese extends Model
{
    use HasFactory;
    protected $fillable = [
        'fonction',
        'autres',
        'user_id',
        'entreprise_id',
       
    ];
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id'); 
    }
}
