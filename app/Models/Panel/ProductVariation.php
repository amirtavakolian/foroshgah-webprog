<?php

namespace App\Models\Panel;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariation extends Model
{
    use HasFactory;

    protected $table='product_variations';
    protected $fillable = ["attribute_id", "product_id", "value", "price", "quantity", "sku"];
    protected $with = ['attribute'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}







