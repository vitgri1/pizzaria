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
        1 => 'cheese',
        2 => 'red peper',
        3 => 'mushrooms',
        4 => 'chicken',
        5 => 'ham',
        6 => 'pepreroni',
        7 => 'bacon',
        8 => 'onion',
        9 => 'capsicum',
        10 => 'olives',
        11 => 'pineapple',
        12 => 'BBQ sauce',
        13 => 'beef',
        14 => 'mince',
        15 => 'chilli',
        16 => 'kale',
        17 => 'prosciutto',
        18 => 'extra cheese',
        19 => 'pesto sauce',
        20 => 'salami',
        21 => 'anchovies',
        22 => 'spinach'
    ];
}
