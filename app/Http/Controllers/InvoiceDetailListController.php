<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Services\InvoiceDetailServiceInterface;
use Illuminate\Support\Collection;

class InvoiceDetailListController extends Controller
{

    private InvoiceDetailServiceInterface $invoiceDetailService;

    public function __construct(InvoiceDetailServiceInterface $invoiceDetailService)
    {
        $this->invoiceDetailService = $invoiceDetailService;
    }

    public function __invoke(Invoice $invoice): Collection
    {
        return $this->invoiceDetailService->getInvoiceDetailsByInvoiceId($invoice->id);
    }
}
