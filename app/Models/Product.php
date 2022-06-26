<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'buy_price',
        'sell_price',
        'image_url',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tk1_products';
}
