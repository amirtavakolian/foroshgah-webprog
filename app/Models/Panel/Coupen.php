<?php

namespace App\Models\Panel;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupen extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = [
        "name", "code", "type", "amount",
        "percentage", "max_percentage_amount", "expired_at", "description"
    ];

}
