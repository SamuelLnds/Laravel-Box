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

        User::factory(2)->create();

        Tenant::factory(5)->create([
            'user_id' => '1'
        ]);

        StorageBox::factory(3)->create([
            'user_id' => '1',
            'tenant_id' => '1'
        ])->each(function ($box) {
            $box->availability = is_null($box->tenant_id) ? true : false;
            $box->save();
        });

    }
}
