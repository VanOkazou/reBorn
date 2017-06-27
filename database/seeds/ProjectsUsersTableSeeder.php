<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array_values(User::all()->pluck('id')->toArray());
        $projects = Project::all()->pluck('id')->toArray();

        foreach($projects as $project) {

            DB::table('project_user')->insert(
                [
                    'project_id' => $project,
                    'user_id'    => $users[array_rand($users, 1)]
                ]
            );
        }

    }
}
