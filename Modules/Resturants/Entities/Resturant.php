<?php

namespace Modules\Resturants\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resturant extends Model
{
    use HasFactory;

    protected $table = "resturants";
    protected $fillable = 
    [
        'name',
        'description',
        'rating',
        'location',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Resturants\Database\factories\ResturantFactory::new();
    }
}
