<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'title',
        'timeReminder',
        'createdBy',
        'description'
    ];
    protected $table = 'reminders';
    public $timestamps = true;
}
