<?php

namespace App\Domains\Products\Services;

use App\Domains\Products\Models\Products;
use App\Domains\Products\DTO\ProductDTO;

class DeleteProductService
{
    public function delete(int $id): bool
    {

        return Products::find($id)->delete();
    }
}