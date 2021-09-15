<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com', 
            'mobile' => '9876543210',
            'password' => Hash::make('admin@123'),
        ]);       
    }
}
