<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'productName',
        'quantity',
        'price',
        'image',
    ];
    protected $table = 'products';
    public $timestamps = false;
}
