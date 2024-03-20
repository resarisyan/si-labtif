<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class HomeAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'About Us',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero in dui sollicitudin, nec aliquet nunc tincidunt',
        ]);
    }
}
