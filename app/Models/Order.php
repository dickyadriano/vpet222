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
        'vaccineID',
        'orderType',
        'orderAmount',
        'totalPrice',
        'orderDetail',
        'orderStatus',
        'receiptImage',
    ];
    protected $table = 'orders';
    protected $hidden = ['id'];
    public $timestamps = false;
}
