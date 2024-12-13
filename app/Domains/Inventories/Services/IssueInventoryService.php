<?php

namespace App\Domains\Inventories\Services;

use App\Domains\Inventories\DTO\InventoryDTO;
use App\Domains\Inventories\Models\Inventories;
use Exception;

class IssueInventoryService
{
    public function issue(InventoryDTO $inventoryDTO): Inventories
    {
        $data = $inventoryDTO->toArray();

        $inventory = Inventories::where('product_id', $data['product_id'])->first();

        $inventory->quantity -= $data['quantity'];
        $inventory->save();

        return $inventory;
    }
}
