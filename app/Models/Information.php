<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'information',
        'image',
    ];
    protected $table = 'information';
    public $timestamps = false;
}
