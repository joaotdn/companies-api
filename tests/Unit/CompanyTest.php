<?php

namespace Tests\Unit;

use App\Models\Company as ModelsCompany;
use Tests\TestCase;
use Faker\Factory as Faker;

class CompanyTest extends TestCase
{
    /** @test */
    public function check_companies_columns_is_correct() {
        $company = new ModelsCompany();

        $expect = [
            'name',
            'description',
            'email',
            'whatsapp',
            'state',
            'city'
        ];

        $array_compare = array_diff($expect, $company->getFillable());

        $this->assertEquals(0, count($array_compare));
    }

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
        $faker = Faker::create();
        $response = $this->post('/api/company', [
            'name' => $faker->company(),
            'description' => $faker->realText(),
            'email' => $faker->companyEmail(),
            'whatsapp' => $faker->phoneNumber(),
            'state' => $faker->randomElement(['PB', 'RJ', 'DF', 'SP', 'PA', 'MG']),
            'city' => $faker->city()
        ]);

        $response->assertStatus(201);
    }
}
