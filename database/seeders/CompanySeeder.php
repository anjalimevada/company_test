<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'company1', 
            'email' => 'company1@gmail.com', 
            'mobile' => '9876543210',
            'password' => Hash::make('admin@123'),
            'website' => 'https://www.google.co.in',
            'address' => 'bhavnagar-364002',
        ]);       

        Company::create([
            'name' => 'company1', 
            'email' => 'company1@gmail.com', 
            'mobile' => '9876543210',
            'password' => Hash::make('admin@123'),
            'website' => 'https://www.google.co.in',
            'address' => 'bhavnagar-364002',
        ]);       
        Company::create([
            'name' => 'company2', 
            'email' => 'company2@gmail.com', 
            'mobile' => '9876543210',
            'password' => Hash::make('company2@123'),
            'website' => 'https://www.google.co.in',
            'address' => 'bhavnagar-364002',
        ]);       
        Company::create([
            'name' => 'company3', 
            'email' => 'company3@gmail.com', 
            'mobile' => '9876543210',
            'password' => Hash::make('company3@123'),
            'website' => 'https://www.google.co.in',
            'address' => 'bhavnagar-364002',
        ]);       
    }
}
