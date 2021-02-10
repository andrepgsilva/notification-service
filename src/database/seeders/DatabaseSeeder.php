<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Andre Silva',
            'email' => 'andrepgsilva2@gmail.com',
            'password' => Hash::make('123456')
        ]);

        Order::factory()->create();
    }
}
