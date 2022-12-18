<?php

namespace App\Models;

use App\Models\Panel\Category;
use App\Models\Panel\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table='attribute_product';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function category()
    {
        return $this->hasManyThrough(Category::class, Product::class);
    }
}
