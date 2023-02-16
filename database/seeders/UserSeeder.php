<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'document' => '88888888',
            'username' => 'test.test',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        User::factory(1)->create();
    }
}
