<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritePizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'pizza_id',
    ];
}
