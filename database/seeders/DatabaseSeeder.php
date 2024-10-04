<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\StorageBox;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        User::factory(10)->create();

        StorageBox::factory(7)->create([
            'user_id' => '1'
        ]);

        StorageBox::factory(5)->create();

        Tenant::factory(15)->create();
        Tenant::factory(7)->create([
            'user_id' => '1'
        ]);
    }
}
