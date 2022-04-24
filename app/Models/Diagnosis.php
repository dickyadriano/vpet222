<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'symptom',
        'petsType'
    ];
    protected $table = 'diagnoses';
    public $timestamps = true;
}
