<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                "category" => "New",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "Second",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "Samsung",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "S Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "M Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "A Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "J Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "Note Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "iPhone",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "7 Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "8 Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "10 Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "11 Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category" => "12 Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];

        foreach ($datas as $data) {
            DB::table('categories')->insert($data);
        }
    }
}
