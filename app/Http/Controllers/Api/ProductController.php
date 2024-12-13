<?php

namespace App\Http\Controllers\Api;

use App\Domains\Products\Services\GetProductService;
use App\Domains\Products\Services\StoreProductService;
use App\Domains\Products\Services\DeleteProductService;
use App\Domains\Products\DTO\ProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;

class ProductController extends Controller
{
    protected $getProductService;
    protected $storeProductService;
    protected $deleteProductService;

    public function __construct(
        GetProductService $getProductService, 
        StoreProductService $storeProductService,
        DeleteProductService $deleteProductService
    )
    {
        $this->getProductService = $getProductService;
        $this->storeProductService = $storeProductService;
        $this->deleteProductService = $deleteProductService;
    }

    public function index()
    {
        $products = $this->getProductService->getProducts();
        return ApiResponse::sendResponse($products, "Success");
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        
        $this->storeProductService->create(ProductDTO::fromArray($validated));

        return ApiResponse::sendResponse(null, "Product Successfully saved");
    }

    public function show(int $id)
    {
        $products = $this->getProductService->getProductById($id);
        return ApiResponse::sendResponse($products, "Success");
    }

    public function update(StoreProductRequest $request, int $id)
    {
        $validated = $request->validated();
        
        $this->storeProductService->update(ProductDTO::fromArray($validated), $id);

        return ApiResponse::sendResponse(null, "Product Successfully saved");
    }
    
    public function destroy(int $id)
    {
        $this->deleteProductService->delete($id);
        return ApiResponse::sendResponse(null, "Product Successfully deleted");
    }
}