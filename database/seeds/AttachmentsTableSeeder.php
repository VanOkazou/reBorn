<?php

use App\Models\Attachment;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $projects = Project::all();
        foreach ($projects as $project) {

            foreach(range(1, 4) as $index) {
                $attachment = [
                    'project_id'  => $project->id,
                    'url'         => $faker->imageUrl(),
                ];

                Attachment::create($attachment);
            }
        }
    }
}
