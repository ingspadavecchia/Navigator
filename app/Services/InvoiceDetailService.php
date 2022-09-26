<?php

namespace App\Services;

use App\Models\InvoiceDetail;
use Illuminate\Support\Collection;

class InvoiceDetailService implements InvoiceDetailServiceInterface
{

    public function getInvoiceDetailsByInvoiceId(int $invoiceId): Collection
    {
        return InvoiceDetail::where('invoice_id', $invoiceId)->with('product')->get();
    }
}
