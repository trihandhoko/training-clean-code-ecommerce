<?php

namespace App\Domains\Ratings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRatings extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}