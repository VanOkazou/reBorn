<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TechnosTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(AttachmentsTableSeeder::class);

        $this->call(ProjectsUsersTableSeeder::class);
        $this->call(CategoriesProjectsTableSeeder::class);
        $this->call(ProjectsTechnosTableSeeder::class);
    }
}
