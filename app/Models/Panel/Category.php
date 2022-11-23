<?php

namespace App\Models\Panel;

use App\Models\Panel\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name","slug","parent_id","is_active","icon","description"];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getStatusAttribute()
    {
        $status = $this->is_active ? ['فعال', 'greendark'] : ['غیر فعال', 'red'];
        return "<span style='color:$status[1]'>$status[0]</span>";
    }
}


