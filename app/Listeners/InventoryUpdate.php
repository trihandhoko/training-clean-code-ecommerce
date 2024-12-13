<?php

namespace App\Listeners;

use App\Domains\Inventories\DTO\InventoryDTO;
use App\Domains\Inventories\Models\Inventories;
use App\Domains\Inventories\Services\IssueInventoryService;
use App\Events\OrderIssued;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InventoryUpdate
{
    protected $issueInventoryService;

    /**
     * Create the event listener.
     *
     * @param InventoryService $inventoryService
     */
    public function __construct(IssueInventoryService $issueInventoryService)
    {
        $this->issueInventoryService = $issueInventoryService;
    }

    public function handle(OrderIssued $event)
    {
        $order = $event->order;
        //trigger service inventory update
        $this->issueInventoryService->issue(InventoryDTO::fromArray($order));
    }
}
