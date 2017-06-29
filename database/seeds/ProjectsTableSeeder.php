<?php

use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 15 ) as $index) {
            $project = [
                'id'            => $index,
                'title'         => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'une'           => $faker->imageUrl(),
                'description'   => $faker->text($maxNbChars = 200),
                'date'          => $faker->dateTime()
            ];

            Project::create($project);
        }

    }
}
