<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = Http::withHeaders([
            "Key" => "d687494e8b7d9bd2ed9fbc1244f64b79"
        ])->get("https://api.rajaongkir.com/starter/city");
        $datas = $cities["rajaongkir"]["results"];
        foreach ($datas as $data) {
            $data_cities[] = [
                "id" => $data["city_id"],
                "province_id" => $data["province_id"],
                "type" => $data["type"],
                "city_name" => $data["city_name"],
            ];
        }
        Cities::insert($data_cities);
    }
}
