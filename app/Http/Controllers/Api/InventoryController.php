<?php

namespace App\Http\Controllers\Api;

use App\Domains\Inventories\DTO\InventoryDTO;
use App\Domains\Inventories\Services\AddInventoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventories\AddInventoriesRequest;

class InventoryController extends Controller
{
    protected $addInventoriesService;

    public function __construct(
        AddInventoryService $addInventoriesService
    ) {
        $this->addInventoriesService = $addInventoriesService;
    }

    public function store(AddInventoriesRequest $request)
    {
        $validated = $request->validated();
        $this->addInventoriesService->create(InventoryDTO::fromArray($validated));
        return response()->json(['message' => "Add inventory success"]);
    }
}
