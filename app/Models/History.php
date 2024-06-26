<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';
    protected $primaryKey = 'historyID';
    protected $fillable = [
        'orderID',
        'qty',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID', 'orderID');
    }
}
