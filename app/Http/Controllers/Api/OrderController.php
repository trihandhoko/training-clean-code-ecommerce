<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Domains\Orders\Services\StoreOrderService;
use App\Domains\Orders\DTO\OrderDTO;
use App\Helpers\ApiResponse;


class OrderController extends Controller
{
    protected $storeOrderService;

    public function __construct( 
        StoreOrderService $storeOrderService
    )
    {
        $this->storeOrderService = $storeOrderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        
        $this->storeOrderService->create(OrderDTO::fromArray($validated));

        return ApiResponse::sendResponse(null, "Order Successfully saved");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}