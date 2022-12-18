<?php

namespace App\Models\Panel;


use App\Models\Panel\Product;
use App\Models\AttributeValue;
use App\Models\Panel\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributeValue()
    {
        return $this->hasMany(AttributeValue::class)->select('attribute_id', 'value')->distinct();
    }

    public function variationsValue()
    {
        return $this->hasMany(ProductVariation::class)->select('attribute_id', 'value')->distinct();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


    public function variation()
    {
        return $this->hasOne(ProductVariation::class, 'attribute_id');
    }
}
