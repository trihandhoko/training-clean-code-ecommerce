<?php

namespace App\Http\Controllers\Api;

use App\Domains\Products\Services\GetProductService;
use App\Domains\Products\Services\StoreProductService;
use App\Domains\Products\DTO\ProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $getProductService;
    protected $storeProductService;

    public function __construct(GetProductService $getProductService, StoreProductService $storeProductService)
    {
        $this->getProductService = $getProductService;
        $this->storeProductService = $storeProductService;
    }

    public function index()
    {
        $products = $this->getProductService->getProducts();
        return response()->json($products);
    }

    public function store(StoreProductRequest $request)
    {
        //1 validate menggunakan request
        $validated = $request->validated();
        //2. store dengna service store product
        $this->storeProductService->create(ProductDTO::fromArray($validated));

        //3. return message success
        return response()->json(['message' => "Store success"]);
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}