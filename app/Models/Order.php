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

    const BASES = [
        'small' => 8, 
        'medium' => 10, 
        'large' => 12
    ];

    const TOPPINGS = [
        '1' => 'cheese',
        '2' => 'red peper',
        '3' => 'mushrooms',
        '4' => 'chicken',
        '5' => 'ham',
        '6' => 'pepreroni'
    ];
}
