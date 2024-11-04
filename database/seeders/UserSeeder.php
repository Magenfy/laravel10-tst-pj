<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@laravelfull.com.br',
            'phone' => '11948830774',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('@Micah2025'),
        ]);

    }

}
