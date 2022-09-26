<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceSummaryListRequest;
use App\Services\InvoiceSummaryServiceInterface;

class InvoiceSummaryList extends Controller
{

    private InvoiceSummaryServiceInterface $invoiceSummaryService;

    public function __construct(InvoiceSummaryServiceInterface $invoiceSummaryService)
    {
        $this->invoiceSummaryService = $invoiceSummaryService;
    }

    public function __invoke(InvoiceSummaryListRequest $request): \Illuminate\Support\Collection
    {
        $clientIds = $request->get('client_ids');

        return $this->invoiceSummaryService->getInvoiceSummaryByClientIds($clientIds);
    }
}
