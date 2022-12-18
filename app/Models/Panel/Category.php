<?php

namespace App\Models\Panel;

use App\Models\AttributeValue;
use App\Models\Panel\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug", "parent_id", "is_active", "icon", "description"];
    protected $with = ['attributes', 'parent', 'products'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('is_filter', 'is_variation');
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getStatusAttribute()
    {
        $status = $this->is_active ? ['فعال', '#11fa11'] : ['غیر فعال', 'red'];
        return "<span style='color:$status[1]'>$status[0]</span>";
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

/*     public function getRouteKeyName()
    {
        return 'slug';
    }
 */
}
