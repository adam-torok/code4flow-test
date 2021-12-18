<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate([
            'email' => 'admin@admin.hu',
            'name' => 'Admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
        ]);
    }
}
