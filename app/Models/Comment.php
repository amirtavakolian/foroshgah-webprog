<?php

namespace App\Models;

use App\Models\Panel\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','product_id','approved','text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getCommentStatusAttribute()
    {
        return $this->approved ? 1 : 0;
    }

    public function getFullCommentAttribute()
    {
        return $this->text;
    }
}
