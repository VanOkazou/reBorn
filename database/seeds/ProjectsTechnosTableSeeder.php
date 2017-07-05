<?php

use Illuminate\Database\Seeder;
use App\Models\Techno;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectsTechnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technos = Techno::all()->pluck('id')->toArray();
        $projects = Project::all()->pluck('id')->toArray();

        foreach($projects as $project) {
            $rand = rand(2, count($technos));
            $randTechnos = array_rand($technos, $rand);

            foreach ($randTechnos as $randTec) {
                DB::table('project_techno')->insert(
                    [
                        'project_id' => $project,
                        'techno_id' => $technos[$randTec]
                    ]
                );
            }
        }

    }
}
