<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $cast = [
        'is_published' => 'boolean'
    ];

    protected $fillable = [
        'name',
        'description',
        'image',
        'video_id',
        'video_vr',
        'lat',
        'long',
        'is_published',
    ];
}
