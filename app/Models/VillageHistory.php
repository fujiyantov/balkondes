<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_id',
        'name',
        'description',
        'image',
        'video_vr',
        'video_etc',
        'video_id',
        'lat',
        'long',
    ];
}
