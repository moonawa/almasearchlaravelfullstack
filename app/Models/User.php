<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\HasDatabaseNotifications;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasDatabaseNotifications;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telephone',
        'role',
        'alma',
        'avatar',
        'status',
        'posteuser'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function candidat()
    {
        return $this->hasOne(Candidat::class,'user_id');
    }
    public function entreprise()
    {
        return $this->hasOne(Entreprise::class,'user_id');
    }
    public function interlocuteurese()
    {
        return $this->hasOne(Interlocuteurese::class,'user_id');
    }
    public function interlocuteurcbt()
    {
        return $this->hasOne(Interlocuteurcbt::class,'user_id');
    }
    public function cabinet()
    {
        return $this->hasOne(Cabinet::class, 'user_id');
    }
    // Ajoutez ces méthodes au modèle User
    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }

    public function getLastNameAttribute()
    {
        $nameParts = explode(' ', $this->name);
        return isset($nameParts[1]) ? $nameParts[1] : '';
    }
}
