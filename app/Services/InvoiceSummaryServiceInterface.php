<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface InvoiceSummaryServiceInterface
{
    public function getInvoiceSummaryByClientIds(array $clientIds = null): Collection;
}
