<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'is_active'];


    public function getStatusAttribute()
    {
        $data = $this->is_active ? ['فعال', 'success'] : ['غیر فعال', 'danger'];
        return "<span  class=\"text-$data[1]\"> $data[0]</span>";
    }
}

