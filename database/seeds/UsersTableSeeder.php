<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user = [
            'username'  => 'Ultime Evangelist',
            'slug'     => 'ultime_evangelist',
            'lastname' => 'Bibou',
            'firstname'=> 'Admin',
            'job'      => 'Reborn Creator',
            'avatar'   => $faker->imageUrl(),
            'city'     => 'Paris',
            'status'   => 1,
            'email'    => 'p.vannareth@gmail.com',
            'password' => bcrypt('bibou')
        ];

        User::updateOrCreate(['email' => $user['email']], $user);
    }
}
