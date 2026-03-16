<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(5)->create();

        Category::factory(5)->create();

        $this->call([
            PostSeeder::class
        ]);
    }
}
