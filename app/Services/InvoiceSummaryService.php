<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class InvoiceSummaryService implements InvoiceSummaryServiceInterface
{

    public function getInvoiceSummaryByClientIds(array $clientIds = null): Collection
    {
        $query = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->join('invoice_details', 'invoice_details.invoice_id', '=', 'invoices.id')
            ->join('products', 'invoice_details.product_id', '=', 'products.id')
            ->selectRaw(
                "
                 invoices.id as invoice_id ,
                 invoices.number as invoice_number,
                 clients.name as client_name,
                 invoices.posted_at as invoice_posted_at,
                 invoices.status as invoice_status,
                 SUM( invoice_details.quantity * products.price ) as invoice_amount"
            )
            ->groupBy('invoices.id')
            ->orderBy('invoices.id');

        if ($clientIds !== null) {
            $query->whereIn('invoices.client_id', $clientIds);
        }

        return $query->get();
    }
}
