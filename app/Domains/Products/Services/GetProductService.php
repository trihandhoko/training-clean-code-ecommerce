<?php

namespace App\Domains\Products\Services;

use App\Domains\Products\Models\Products;

class GetProductsService
{
    public function __construct(
        public ?string $sortBy,
        public ?string $sortDirection,
        public ?string $searchTerm
    ) {
    }
    
    public function getProducts(): Collection
    {
        return Products::all();
    }
    
    public function getProductById(int $id): Collection
    {
        return $this->httpClient
            ->get('products', $data->toArray())
            ->map(fn (array $product) => ProductData::fromArray($product));
    }
}