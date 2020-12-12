<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=21; $i <= 40; $i++) { 
            Document::factory([
                'path' => "/images/pages/carousel/banner-{$i}.jpg",
                'name' => Str::random(10) . "-banner-{$i}.jpg",
                'user_file_name' => "banner-{$i}.jpg",
            ])->create();
        }
    }
}
