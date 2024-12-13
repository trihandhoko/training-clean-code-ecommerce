<?php

namespace App\Domains\Orders\DTO;

class OrderDTO
{
    public int $product_id;

    public int $quantity;

    public function __construct(int $product_id, int $quantity)
    {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['product_id'],
            $data['quantity']
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
