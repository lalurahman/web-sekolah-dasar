<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTaskGallery extends Model
{
    use HasFactory;

    protected $fillable = ['detail_task_id','photo'];
}
