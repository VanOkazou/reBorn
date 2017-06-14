<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'web'],
            ['name' => 'design'],
            ['name' => 'print'],
            ['name' => 'illustration'],
            ['name' => 'e-commerce'],
        ];

        foreach($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']]);
        }
    }
}
