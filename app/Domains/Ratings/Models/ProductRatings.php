<?php

namespace App\Domains\Ratings\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRatings extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
