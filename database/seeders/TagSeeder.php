<?php

namespace Database\Seeders;

use App\Models\tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tags = [
            [
                "title" => "Hardware",
                "metatitle" => "Hardware",
                "slug" => "Hardware",
                "content" => "Hardware",
                "user_id" => 1
            ],
            [
                "title" => "Software",
                "metatitle" => "Software",
                "slug" => "Software",
                "content" => "Software",
                "user_id" => 1
            ],
            [
                "title" => "Data Science",
                "metatitle" => "Data Science",
                "slug" => "Data Science",
                "content" => "Data Science",
                "user_id" => 1
            ],
            [
                "title" => "Gaming",
                "metatitle" => "Gaming",
                "slug" => "Gaming",
                "content" => "Gaming",
                "user_id" => 1
            ]
        ];

        foreach($tags as $tag){
            tag::insert($tag);
        }
    }
}
