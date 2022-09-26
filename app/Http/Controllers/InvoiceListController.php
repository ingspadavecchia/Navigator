<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceListRequest;
use App\Services\InvoiceServiceInterface;
use Illuminate\Support\Collection;

class InvoiceListController extends Controller
{

    private InvoiceServiceInterface $invoiceService;

    public function __construct(InvoiceServiceInterface $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function __invoke(InvoiceListRequest $request): Collection
    {
        $clientIds = $request->get('client_ids');

        return $this->invoiceService->getInvoiceSummaryByClientIds($clientIds);
    }
}
