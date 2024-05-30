<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['productID'];

    protected $primaryKey = 'productID';

    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'qty',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userMasterID');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'productID');
    }


}
