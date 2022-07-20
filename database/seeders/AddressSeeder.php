<?php

namespace Database\Seeders;

use App\Models\Addresses;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Addresses::create([
            "user_id" => "1",
            "no_hp" => "8822211",
            "alamat" => "Jalan Astana Anyar No 324",
            "kecamatan" => "Nyengseret",
            "id_provinces" => "1",
            "id_cities" => "1",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
