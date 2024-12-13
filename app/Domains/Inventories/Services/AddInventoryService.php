<?php

namespace App\Domains\Inventories\Services;

use App\Domains\Inventories\DTO\InventoryDTO;
use App\Domains\Inventories\Models\Inventories;

class AddInventoryService
{
    public function create(InventoryDTO $inventoryDTO): Inventories
    {
        $data = $inventoryDTO->toArray();

        $inventory = Inventories::where('product_id', $data['product_id'])->first();

        if ($inventory) {
            $inventory->quantity += $data['quantity'];
            $inventory->save();

            return $inventory;
        }

        return Inventories::create($data);
    }
}
