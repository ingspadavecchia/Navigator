<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ClientListTest extends TestCase
{
    public const EXPECTED_AMOUNT_OF_CLIENTS = 20;

    public function test_the_client_list_returns_a_successful_response(): void
    {
        $response = $this->get('/api/clients');

        $response->assertOk();

        $response->assertJsonCount(self::EXPECTED_AMOUNT_OF_CLIENTS);
    }

    public function test_the_client_list_has_column_id_and_name(): void
    {
        $response = $this->get('/api/clients');

        $response->assertJson(fn(AssertableJson $json) =>
            $json->each(
                fn ($json) =>
                $json->hasAll(['id', 'name'])
                    ->etc()
            )
        );
    }

}
