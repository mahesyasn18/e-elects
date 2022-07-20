<?php

namespace Database\Seeders;

use App\Models\Addresses;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            CitySeeder::class,
            ProvinceSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            AddressSeeder::class,
            TagSeeder::class
        ]);
    }
}
