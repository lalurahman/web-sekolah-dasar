<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'lessons_id',
        'classrooms_id',
        'title',
        'detail',
        'due_date'
    ];

}
