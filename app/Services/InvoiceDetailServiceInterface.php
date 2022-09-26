<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface InvoiceDetailServiceInterface
{
    public function getInvoiceDetailsByInvoiceId(int $invoiceId): Collection;
}
