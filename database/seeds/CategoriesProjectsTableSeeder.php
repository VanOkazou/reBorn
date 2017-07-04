<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class CategoriesProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all()->pluck('id')->toArray();

        $categories = Category::all()->pluck('id')->toArray();

        foreach($projects as $project) {
            $rand = rand(2, count($categories));
            $randCats = array_rand($categories, $rand);

            foreach ($randCats as $randCat) {
                DB::table('category_project')->insert(
                    [
                        'project_id' => $project,
                        'category_id' => $categories[$randCat]
                    ]
                );
            }
        }
    }
}
