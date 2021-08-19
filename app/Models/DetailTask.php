<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'tasks_id',
        'users_id',
        'status_periksa',
        'nilai'
    ];
}
