<?php

namespace App\Models\Panel;

use App\Models\Panel\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $with = ['products'];


    protected $fillable = ['name', 'slug', 'is_active'];


    public function getStatusAttribute()
    {
        $data = $this->is_active ? ['فعال', 'success'] : ['غیر فعال', 'danger'];
        return "<span  class=\"text-$data[1]\"> $data[0]</span>";
    }

    public function products()
    {
        return $this->hasMany(Product::class)->with('category');
    }
}

