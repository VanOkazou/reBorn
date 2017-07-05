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
            ['name' => 'Photoshop CC', 'type' => 'soft', 'icon' => 'images/icon/icon_photoshop.png'],
            ['name' => 'Indesign CC', 'type' => 'soft', 'icon' => 'images/icon/icon_indesign.png'],
            ['name' => 'Illustrator CC' , 'type' => 'soft', 'icon' => 'images/icon/icon_illustrator.png'],
            ['name' => 'Php' , 'type' => 'lang', 'icon' => 'images/icon/icon_php.png'],
            ['name' => 'Html 5' , 'type' => 'lang', 'icon' => 'images/icon/icon_html5.png'],
            ['name' => 'Css 3' , 'type' => 'lang', 'icon' => 'images/icon/icon_css3.png'],
            ['name' => 'Sass' , 'type' => 'lang', 'icon' => 'images/icon/icon_sass.png'],
            ['name' => 'Javascript 5' , 'type' => 'lang', 'icon' => 'images/icon/icon_js5.png'],
            ['name' => 'Ecmascript 6' , 'type' => 'lang', 'icon' => 'images/icon/icon_es6.png'],
            ['name' => 'jQuery' , 'type' => 'lang', 'icon' => 'images/icon/icon_jquery.png'],
            ['name' => 'Node JS' , 'type' => 'lang', 'icon' => 'images/icon/icon_nodejs.png'],
            ['name' => 'React JS' , 'type' => 'fram', 'icon' => 'images/icon/icon_reactjs.png'],
            ['name' => 'Bootstrap' , 'type' => 'fram', 'icon' => 'images/icon/icon_bootstrap.png'],
            ['name' => 'Laravel' , 'type' => 'fram', 'icon' => 'images/icon/icon_laravel.png'],
            ['name' => 'Symfony' , 'type' => 'fram', 'icon' => 'images/icon/icon_symfony.png'],
            ['name' => 'Wordpress' , 'type' => 'cms', 'icon' => 'images/icon/icon_wordpress.png'],
            ['name' => 'Prestashop' , 'type' => 'cms', 'icon' => 'images/icon/icon_prestashop.png'],
        ];

        foreach($technos as $techno) {
            Techno::updateOrCreate(['name' => $techno['name'], 'type' => $techno['type'], 'icon' => $techno['icon']]);
        }
    }
}
