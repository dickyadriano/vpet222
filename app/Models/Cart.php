<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'cartId',
        'userID',
        'productID',
        'medicineID',
        'orderType',
        'orderAmount'
    ];
    protected $table = 'carts';
    protected $primaryKey = 'cartId';
    public $timestamps = false;
}
