<?php

namespace App\Domains\Products\Services;


class ProductsService
{
    public function __construct(
        public ?string $sortBy,
        public ?string $sortDirection,
        public ?string $searchTerm
    ) {
    }
    
    public function getProducts(){
        
    }
}