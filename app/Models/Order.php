<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['base', 'name'];
    public $timestamps = false;
    protected $casts = [
        'toppings' => 'array',
    ];
}
