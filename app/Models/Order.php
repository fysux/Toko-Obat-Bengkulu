<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $primaryKey = 'orderID';

    protected $fillable = [
        'userID',
        'productID',
        'qty',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'orderID');
    }
}
