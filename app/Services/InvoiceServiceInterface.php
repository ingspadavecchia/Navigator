<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface InvoiceServiceInterface
{
    public function getInvoiceSummaryByClientIds(array $clientIds = null): Collection;
}
