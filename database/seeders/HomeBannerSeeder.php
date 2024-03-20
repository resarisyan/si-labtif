<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'title' => 'WELCOME TO ASLABTIF',
            'caption' => 'Learn New Skills With Us',
            'description' => 'Technology is best when it brings people together',
        ]);
    }
}
