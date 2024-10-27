<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $table = 'tools';
    protected $fillable = [
        'title',
        'description',
        'slug',
        'image',
        'published',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
