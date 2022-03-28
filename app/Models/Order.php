<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
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
        'totalPrice',
        'orderDetail',
        'orderStatus',
    ];
    protected $table = 'orders';
    protected $hidden = ['id'];
    public $timestamps = false;
}
