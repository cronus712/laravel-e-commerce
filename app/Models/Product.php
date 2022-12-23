<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory; use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'quantity',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_description',
        'meta_keywords',

    ];

    
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
