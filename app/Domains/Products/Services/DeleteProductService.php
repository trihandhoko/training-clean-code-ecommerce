<?php

namespace App\Domains\Products\Services;

use App\Domains\Products\Models\Products;

class DeleteProductService
{
    public function delete(int $id): bool
    {

        return Products::find($id)->delete();
    }
}
