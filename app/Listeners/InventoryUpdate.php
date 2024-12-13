<?php

namespace App\Listeners;

use App\Domains\Inventories\DTO\InventoryDTO;
use App\Domains\Inventories\Services\IssueInventoryService;
use App\Events\OrderIssued;

class InventoryUpdate
{
    protected $issueInventoryService;

    /**
     * Create the event listener.
     *
     * @param  InventoryService  $inventoryService
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
