<?php

namespace Tests\Unit;

use App\Models\Company as ModelsCompany;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /** @test */
    public function email_and_whatsapp_duplicate()
    {
        $company1 = ModelsCompany::make([
            'email'    => 'email1@mail.com',
            'whatsapp' => '012983102938'
        ]);

        $company2 = ModelsCompany::make([
            'email'    => 'email2@mail.com',
            'whatsapp' => '012983102937'
        ]);

        $this->assertTrue($company1->email != $company2->email);
        $this->assertTrue($company1->whatsapp != $company2->whatsapp);
    }

    /** @test */
    public function delete_company() {
        $company = ModelsCompany::factory()->count(1)->make();
        $company = ModelsCompany::first();

        if ($company) {
            $company->delete();
        }

        $this->assertTrue(true);
    }

    /** @test */
    public function stores_new_company() {
        $response = $this->post('/api/company', [
            'name' => 'Company 2',
            'description' => 'Description 2',
            'email' => 'email3r@bol.com',
            'whatsapp' => '1557390412222283',
            'state' => 'XX',
            'city' => 'JP'
        ]);

        $response->assertStatus(201);
    }
}
