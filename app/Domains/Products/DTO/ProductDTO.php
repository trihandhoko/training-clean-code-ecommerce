<?php

namespace App\Domains\Products\DTO;

class ProductDTO
{
    public string $name;
    public string $description;
    public float $price;

    public function __construct(string $name, string $description, float $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['description'],
            $data['price']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];
    }
}
