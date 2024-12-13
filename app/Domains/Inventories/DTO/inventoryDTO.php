<?php

namespace App\Domains\Inventories\DTO;

class InventoryDTO
{
    public string $product_id;
    public string $quantity;

    public function __construct(string $product_id, int $quantity)
    {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['product_id'],
            $data['quantity'],
        );
    }

    public function toArray(): array
    {
        return [
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
        ];
    }
}
