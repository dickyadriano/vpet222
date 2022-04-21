<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'vaccineName',
        'stock',
        'vaccineDetail',
        'vaccinePrice',
        'image',
    ];
    protected $table = 'vaccines';
    public $timestamps = false;
}
