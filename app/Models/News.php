<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'published_at'];
    // Кастинг полей даты в объекты Carbon
    protected $casts = [
        'published_at' => 'datetime',
    ];
    use HasFactory;
}
