<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_id',
        'name',
        'price',
        'category',
        'image',
        'address',
        'description',
        'addtional_information',
        'seller_name',
        'is_published',
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
