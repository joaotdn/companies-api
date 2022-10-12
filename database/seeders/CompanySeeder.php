<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $i = 1;
        while($i <= 10) {
            $company = new Company();
            $company->name = $faker->company();
            $company->description = $faker->text(150);
            $company->email = $faker->companyEmail();
            $company->whatsapp = $faker->phoneNumber();
            $company->state = $faker->randomElement(['PB', 'RJ', 'DF', 'SP', 'PA', 'MG']);
            $company->city = $faker->city();
            $company->save();
            $i++;
        }
    }
}
