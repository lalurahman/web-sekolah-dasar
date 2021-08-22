<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'status_periksa',
        'nilai'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail_task_gallery()
    {
        return $this->hasMany(DetailTaskGallery::class);
    }
}
