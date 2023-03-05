<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Medellín',
            'slug' => 'medellin',
            'country_id' => '1',
        ]);

        City::create([
            'name' => 'Montería',
            'slug' => 'monteria',
            'country_id' => '1',
        ]);
    }
}
