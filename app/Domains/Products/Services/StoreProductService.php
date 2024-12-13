<?php

namespace App\Domains\Products\Services;

use App\Domains\Products\Models\Products;
use App\Domains\Products\DTO\ProductDTO;

class StoreProductService
{
    public function create(ProductDTO $productDTO): Products
    {

        return Products::create($productDTO->toArray());
    }
}
