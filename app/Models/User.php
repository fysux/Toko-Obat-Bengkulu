<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';

    protected $primaryKey = 'userID';

    protected $fillable = [
        'name',
        'email',
        'noHp',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function userMaster()
    {
        return $this->hasOne(UserMaster::class, 'userID', 'userID');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'userID', 'userID');
    }
}
