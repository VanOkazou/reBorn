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

        $user1 = [
            'username'  => 'Ultime Evangelist',
            'slug'     => 'ultime_evangelist',
            'lastname' => 'Bibou',
            'firstname'=> 'Admin',
            'job'      => 'Reborn Creator',
            'about'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis feugiat mi. Etiam eget nibh a orci pharetra gravida. In hac habitasse platea dictumst. Vestibulum felis libero, tempor tristique malesuada imperdiet, hendrerit et dolor. Mauris posuere tincidunt nunc at rhoncus. Proin mi ipsum, faucibus non tincidunt vitae, interdum non quam. Praesent eu diam quis mauris commodo ultrices.',
            'slogan'   => 'Lorem Ipsum Blabla',
            'description'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis feugiat mi. Etiam eget nibh a orci pharetra gravida. In hac habitasse platea dictumst. Vestibulum felis libero, tempor tristique malesuada imperdiet, hendrerit et dolor. Mauris posuere tincidunt nunc at rhoncus. Proin mi ipsum, faucibus non tincidunt vitae, interdum non quam. Praesent eu diam quis mauris commodo ultrices.',
            'avatar'   => $faker->imageUrl(),
            'city'     => 'Paris',
            'status'   => 1,
            'email'    => 'p.vannareth@gmail.com',
            'password' => bcrypt('bibou')
        ];

        $user2 = [
            'username'  => 'Chuchu',
            'slug'     => 'mariechu',
            'lastname' => 'Chu',
            'firstname'=> 'Marie',
            'job'      => 'Reborn Creator',
            'about'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis feugiat mi. Etiam eget nibh a orci pharetra gravida. In hac habitasse platea dictumst. Vestibulum felis libero, tempor tristique malesuada imperdiet, hendrerit et dolor. Mauris posuere tincidunt nunc at rhoncus. Proin mi ipsum, faucibus non tincidunt vitae, interdum non quam. Praesent eu diam quis mauris commodo ultrices.',
            'slogan'   => 'Lorem Ipsum Blabla',
            'description'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis feugiat mi. Etiam eget nibh a orci pharetra gravida. In hac habitasse platea dictumst. Vestibulum felis libero, tempor tristique malesuada imperdiet, hendrerit et dolor. Mauris posuere tincidunt nunc at rhoncus. Proin mi ipsum, faucibus non tincidunt vitae, interdum non quam. Praesent eu diam quis mauris commodo ultrices.',
            'avatar'   => $faker->imageUrl(),
            'city'     => 'Paris',
            'status'   => 1,
            'email'    => 'chuchu@feedub.com',
            'password' => bcrypt('chuchu')
        ];

        User::updateOrCreate(['email' => $user1['email']], $user1);
        User::updateOrCreate(['email' => $user2['email']], $user2);
    }
}
