<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Coffee Manjehe Admin',
            'email' => 'admin@coffeemanjehe.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}