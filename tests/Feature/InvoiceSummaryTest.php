<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceSummaryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_invoice_summary_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

}
