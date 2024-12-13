<?php

namespace App\Domains\Inventories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventories extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['product_id', 'quantity'];
}
