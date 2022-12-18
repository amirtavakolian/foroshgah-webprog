<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        "image", "title", "text", "priority",
        "is_active", "type", "button_text",
        "button_link", "button_icon"
    ];

    public function getStatusAttribute()
    {
        $status = $this->is_active ? ['فعال', '#11fa11'] : ['غیر فعال', 'red'];
        return "<span style='color:$status[1]'>$status[0]</span>";
    }
}
