<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $primaryKey = 'paymentID';

    protected $fillable = [
        'paymentName',
        'biaya_admin',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'paymentID');
    }
}
