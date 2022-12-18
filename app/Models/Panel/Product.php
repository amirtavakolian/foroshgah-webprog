<?php

namespace App\Models\Panel;

use App\Models\Panel\Tag;
use App\Models\Panel\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["name", "brand_id", "category_id", "is_active", "description", 'primary_image', "delivery_amount", "delivery_amount_per_product"];
    protected $with = ['variations', 'images', 'attributes', 'variation'];
    protected $appends = ['saleCheck'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function variationsOrderByAsc()
    {
        return $this->hasMany(ProductVariation::class)->orderBy('price','desc');
    }

    public function variation()
    {
        return $this->hasOne(ProductVariation::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getStatusAttribute()
    {
        $status = $this->is_active ? ['فعال', '#11fa11'] : ['غیر فعال', 'red'];
        return "<span style='color:$status[1]'>$status[0]</span>";
    }


    public function getQuantityCheckAttribute()
    {
        return $this->variations()->where('quantity', '>' , 0)->first();
    }


    public function getSaleCheckAttribute()
    {
        return $this->variations()
            ->where('quantity', '>', 0)
            ->where('sale_price', '!=', null)
            ->where('date_on_sale_from', "<", Carbon::now())
            ->where('date_on_sale_to', ">=", Carbon::now())
            ->first();
    }
}
