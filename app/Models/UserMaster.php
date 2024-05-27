<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMaster extends Model
{
    use HasFactory;

    protected $table = 'usermaster';

    protected $primaryKey = 'userMasterID';

    protected $fillable = [
        'role',
        'name',
        'userID'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
