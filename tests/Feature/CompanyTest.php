<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /** @test */
    public function access_companies_list_success()
    {
        $response = $this->get('/api/companies');

        $response->assertStatus(200);
    }
}
