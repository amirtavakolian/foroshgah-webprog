<?php

namespace App\Models\Panel;


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
}
