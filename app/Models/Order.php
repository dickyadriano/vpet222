<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'petShopID',
        'customerID',
        'productID',
        'medicineID',
        'groomingID',
        'petCareID',
        'orderType',
        'orderAmount',
        'orderDetail',
        'orderStatus',
    ];
    protected $table = 'orders';
    public $timestamps = false;
}
