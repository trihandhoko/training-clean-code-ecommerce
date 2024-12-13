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

    public function update(ProductDTO $productDTO, int $id): bool
    {

        $product = Products::find($id);
        
        return $product->update($productDTO->toArray());
    }
}