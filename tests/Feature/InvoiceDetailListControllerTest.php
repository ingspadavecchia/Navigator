<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class InvoiceDetailListControllerTest extends TestCase
{
    public const EXPECTED_AMOUNT_OF_INVOICE_DETAILS = 2;
    public const EXPECTED_AMOUNT_OF_FILTERED_INVOICES = 8;

    public function test_the_invoice_detail_list_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api/invoices/1/invoice_details');

        $response->assertOk();

        $response->assertJsonCount(self::EXPECTED_AMOUNT_OF_INVOICE_DETAILS);
    }

    public function test_the_invoice_detail_list_has_specific_columns(): void
    {
        $response = $this->getJson('/api/invoices/1/invoice_details');

        $response->assertJson(fn(AssertableJson $json) => $json->each(
            fn($json) => $json
                ->hasAll([
                    'quantity',
                    'product.description',
                    'product.sku',
                    'product.price',
                ])
                ->etc()
        ));
    }

}
