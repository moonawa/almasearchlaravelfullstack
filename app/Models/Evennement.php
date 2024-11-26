<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evennement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomevent',
        'dateevent',
        'dateevennement',
        'lieuevent',
        'description',
        'photo',
        'statusevent',
        'user_id',
      
    ];
}
