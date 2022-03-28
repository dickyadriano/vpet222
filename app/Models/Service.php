<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'userID',
        'serviceName',
        'price',
        'detail',
        'idCard',
        'detail',
        'vetLicense',
        'image',
        'verificationStatus',
    ];
    protected $table = 'services';
    public $timestamps = false;
}
