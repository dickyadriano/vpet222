<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grooming extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'groomingName',
        'groomingDetail',
        'price',
        'image',
    ];
    protected $table = 'groomings';
    public $timestamps = false;
}
