<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = Http::withHeaders([
            "Key" => "d687494e8b7d9bd2ed9fbc1244f64b79"
        ])->get("https://api.rajaongkir.com/starter/province");
        $datas = $provinces["rajaongkir"]["results"];
        foreach ($datas as $data) {
            $data_provinces[] = [
                "id" => $data["province_id"],
                "province" => $data["province"]
            ];
        }
        Province::insert($data_provinces);
    }
}
