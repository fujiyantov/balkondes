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
        'video_etc',
        'lat',
        'long',
        'is_published',
    ];

    public function culture() {
        return $this->hasMany(VillageHistory::class, 'village_id');
    }
}
