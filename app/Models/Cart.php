<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'productID',
        'medicineID',
        'serviceID',
        'groomingID',
        'petCareID',
        'orderType',
        'orderAmount',
        'orderDetail'
    ];
    protected $table = 'carts';
    public $timestamps = false;
}
