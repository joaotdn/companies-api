<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Company 2',
            'description' => 'Description 2',
            'email' => 'email3r@bol.com',
            'whatsapp' => '1557390412222283',
            'state' => 'XX',
            'city' => 'JP'
        ]);
    }
}
