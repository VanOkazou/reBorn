<?php

use \App\Models\Techno;
use Illuminate\Database\Seeder;

class TechnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technos = [
            ['name' => 'Photoshop', 'type' => 'soft'],
            ['name' => 'Indesign', 'type' => 'soft'],
            ['name' => 'Illustrator' , 'type' => 'soft'],
            ['name' => 'Php' , 'type' => 'lang'],
            ['name' => 'Javascript' , 'type' => 'lang'],
            ['name' => 'jQuery' , 'type' => 'lang'],
            ['name' => 'Node JS' , 'type' => 'lang'],
            ['name' => 'React JS' , 'type' => 'fram'],
            ['name' => 'Bootstrap' , 'type' => 'fram'],
            ['name' => 'Laravel' , 'type' => 'fram'],
            ['name' => 'Symfony' , 'type' => 'fram'],
            ['name' => 'Wordpress' , 'type' => 'cms'],
            ['name' => 'Prestashop' , 'type' => 'cms'],
        ];

        foreach($technos as $techno) {
            Techno::updateOrCreate(['name' => $techno['name'], 'type' => $techno['type']]);
        }
    }
}
