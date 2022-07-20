<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                "tags" => "ordered",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "tags" => "confirmed",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "tags" => "packing",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "tags" => "sent",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "tags" => "completed",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
