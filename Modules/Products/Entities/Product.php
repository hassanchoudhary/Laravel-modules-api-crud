<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    
    protected $table = "products";
    protected $fillable = [
        'name',
        'description',
        'price',
        'qty',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\ProductFactory::new();
    }
}
