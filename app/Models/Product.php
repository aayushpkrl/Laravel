<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable =  [
        'product_category_id',
        'title',
        'description',
        'image',
        'price',
        'status',
    ];

    public function productCategory() {
        return $this->belongsTo(ProductCategory::class);
    }
}
