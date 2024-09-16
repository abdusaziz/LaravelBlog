<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorys = [
            [
                "title" => "Information Technology",
                "metatitle" => "Information Technology",
                "slug" => "Information Technology",
                "content" => "Information Technology",
                "user_id" => 1
            ],
            [
                "title" => "Manufacturing Technology",
                "metatitle" => "Manufacturing Technology",
                "slug" => "Manufacturing Technology",
                "content" => "Manufacturing Technology",
                "user_id" => 1
            ],
            [
                "title" => "Educational Technology",
                "metatitle" => "Educational Technology",
                "slug" => "Educational Technology",
                "content" => "Educational Technology",
                "user_id" => 1
            ],
            [
                "title" => "Networking",
                "metatitle" => "Networking",
                "slug" => "Networking",
                "content" => "Networking",
                "user_id" => 1
            ]
        ];

        foreach($categorys as $category){
            category::insert($category);
        }

    }
}
