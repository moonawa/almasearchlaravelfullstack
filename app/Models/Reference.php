<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomreferent',
        'mailreferent',
        'telephonereferent',
        'posteoccupereferent',
        'entreprisereferent',
        'candidat_id'
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
}
