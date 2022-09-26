<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Invoice;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class InvoiceSummaryListTest extends TestCase
{
    public const EXPECTED_AMOUNT_OF_INVOICES = 80;
    public const EXPECTED_AMOUNT_OF_FILTERED_INVOICES = 8;

    public function test_the_invoice_summary_list_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api/invoice_summary');

        $response->assertOk();

        $response->assertJsonCount(self::EXPECTED_AMOUNT_OF_INVOICES);
    }

    public function test_the_invoice_summary_list_has_specific_columns(): void
    {
        $response = $this->getJson('/api/invoice_summary');

        $response->assertJson(fn(AssertableJson $json) => $json->each(
            fn($json) => $json->hasAll(
                ['invoice_id', 'invoice_number', 'client_name', 'invoice_posted_at', 'invoice_status', 'invoice_amount']
            )
        )
        );
    }

    public function test_the_invoice_summary_filter_by_non_exising_client(): void
    {
        $response = $this->getJson('/api/invoice_summary?client_ids[]=10000');

        $this->assertEquals(422, $response->getStatusCode());

        $response->assertJson([
            'message' => 'The selected client_ids.0 is invalid.',
            'errors' =>
                [
                    'client_ids.0' =>
                        [
                            0 => 'The selected client_ids.0 is invalid.',
                        ],
                ],
        ]);
    }

    public function test_the_invoice_summary_filter_by_two_clients(): void
    {
        $response = $this->getJson('/api/invoice_summary?client_ids[]=1&client_ids[]=2');

        $response->assertOk();

        $response->assertJsonCount(self::EXPECTED_AMOUNT_OF_FILTERED_INVOICES);

        $response->assertJson(fn(AssertableJson $json) => $json->each(
            fn($json) => $json->hasAll(
                ['invoice_id', 'invoice_number', 'client_name', 'invoice_posted_at', 'invoice_status', 'invoice_amount']
            )
        )
        );
    }

    public function test_the_invoice_summary_filter_by_one_client_must_has_the_correct_invoice_amount_value(): void
    {
        $clientId = 1;
        $expectedResponse = [];

        // get the data from the DB in order to manually make the sum
        $invoicesForClient = Invoice::where('client_id', $clientId)->get();

        foreach ($invoicesForClient as $invoice) {
            $invoiceTotals = [
                'invoice_id' => $invoice->id,
                'invoice_amount' => 0,
            ];
            foreach ($invoice->invoiceDetails as $invoiceDetail) {
                $invoiceTotals['invoice_amount'] += $invoiceDetail->quantity * $invoiceDetail->product->price;
            }

            $expectedResponse[] = $invoiceTotals;
        }

        // make the request
        $response = $this->getJson('/api/invoice_summary?client_ids[]=' . $clientId);

        $responseAsArray = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        // assert the response
        foreach ($responseAsArray as $invoice) {
            foreach ($expectedResponse as $expectedInvoice) {
                if ($expectedInvoice['invoice_id'] === $invoice['invoice_id']) {
                    $this->assertEquals(
                        round($expectedInvoice['invoice_amount'], 2),
                        round($invoice['invoice_amount'], 2)
                    );
                }
            }
        }
    }

}
