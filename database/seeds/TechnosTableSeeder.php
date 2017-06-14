<?php

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
            ['name' => 'Laravel' , 'type' => 'fram'],
            ['name' => 'Illustrator' , 'type' => 'soft'],
            ['name' => 'Php' , 'type' => 'lang'],
            ['name' => 'React' , 'type' => 'lang'],
            ['name' => 'Javascript' , 'type' => 'lang'],
            ['name' => 'Node' , 'type' => 'lang'],
            ['name' => 'Prestashop' , 'type' => 'soft'],
            ['name' => 'Bootstrap' , 'type' => 'lang'],
            ['name' => 'Symfony' , 'type' => 'fram'],
        ];

        foreach($technos as $techno) {
            \App\Models\Techno::updateOrCreate(['name' => $techno['name'], 'type' => $techno['type']]);
        }
    }
}
