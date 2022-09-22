<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // create the product list
        $products = Product::factory(20)->create();

        // create 20 clients with35 invoices posted and 1 invoice draft each one
        $clients = Client::factory(20)->create();

        foreach ($clients as $client) {
            $postedInvoices = Invoice::factory(3)->create(
                [
                    Invoice::COL_STATUS => Invoice::STATUS_POSTED,
                    Invoice::COL_POSTED_AT => fake()->dateTimeBetween('-1 year', 'now'),
                    'client_id' => $client->id
                ]
            );

            foreach ($postedInvoices as $invoice) {
                InvoiceDetail::factory(2)->create(
                    [
                        'product_id' => $products->random(1)->first()->id,
                        'invoice_id' => $invoice->id
                    ]
                );
            }

            $draftInvoice = Invoice::factory(1)->create(
                ['client_id' => $client->id]
            );

            InvoiceDetail::factory(1)->create(
                [
                    'product_id' => $products->random(1)->first()->id,
                    'invoice_id' => $draftInvoice->first()->id
                ]
            );
        }
    }
}
