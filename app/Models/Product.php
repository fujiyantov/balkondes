<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

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