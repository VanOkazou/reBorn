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
            [
                'name' => 'Photoshop',
                'type' => 'soft',
                'icon' => 'images/icon/icon_photoshop.png',
                'iconBlack' => 'images/icon/icon_photoshop_black.png'
            ],
            [
                'name' => 'Indesign',
                'type' => 'soft',
                'icon' => 'images/icon/icon_indesign.png',
                'iconBlack' => 'images/icon/icon_indesign_black.png'
            ],
            [
                'name' => 'Illustrator',
                'type' => 'soft',
                'icon' => 'images/icon/icon_illustrator.png',
                'iconBlack' => 'images/icon/icon_illustrator_black.png'
            ],
            [
                'name' => 'Php',
                'type' => 'lang',
                'icon' => 'images/icon/icon_php.png',
                'iconBlack' => 'images/icon/icon_php_black.png'
            ],
            [
                'name' => 'Html',
                'type' => 'lang',
                'icon' => 'images/icon/icon_html5.png',
                'iconBlack' => 'images/icon/icon_html5_black.png'
            ],
            [
                'name' => 'Css',
                'type' => 'lang',
                'icon' => 'images/icon/icon_css3.png',
                'iconBlack' => 'images/icon/icon_css3_black.png'
            ],
            [
                'name' => 'Sass',
                'type' => 'lang',
                'icon' => 'images/icon/icon_sass.png',
                'iconBlack' => 'images/icon/icon_sass_black.png'
            ],
            [
                'name' => 'Javascript',
                'type' => 'lang',
                'icon' => 'images/icon/icon_js5.png',
                'iconBlack' => 'images/icon/icon_js5_black.png'
            ],
            [
                'name' => 'Ecmascript 6',
                'type' => 'lang',
                'icon' => 'images/icon/icon_es6.png',
                'iconBlack' => 'images/icon/icon_es6_black.png'
            ],
            [
                'name' => 'jQuery',
                'type' => 'lang',
                'icon' => 'images/icon/icon_jquery.png',
                'iconBlack' => 'images/icon/icon_jquery_black.png'
            ],
            [
                'name' => 'Node JS',
                'type' => 'lang',
                'icon' => 'images/icon/icon_nodejs.png',
                'iconBlack' => 'images/icon/icon_nodejs_black.png'
            ],
            [
                'name' => 'React JS',
                'type' => 'fram',
                'icon' => 'images/icon/icon_reactjs.png',
                'iconBlack' => 'images/icon/icon_reactjs_black.png'
            ],
            [
                'name' => 'Bootstrap',
                'type' => 'fram',
                'icon' => 'images/icon/icon_bootstrap.png',
                'iconBlack' => 'images/icon/icon_bootstrap_black.png'
            ],
            [
                'name' => 'Laravel',
                'type' => 'fram',
                'icon' => 'images/icon/icon_laravel.png',
                'iconBlack' => 'images/icon/icon_laravel_black.png'
            ],
            [
                'name' => 'Symfony',
                'type' => 'fram',
                'icon' => 'images/icon/icon_symfony.png',
                'iconBlack' => 'images/icon/icon_symfony_black.png'
            ],
            [
                'name' => 'Wordpress',
                'type' => 'cms',
                'icon' => 'images/icon/icon_wordpress.png',
                'iconBlack' => 'images/icon/icon_wordpress_black.png'
            ],
            [
                'name' => 'Prestashop',
                'type' => 'cms',
                'icon' => 'images/icon/icon_prestashop.png',
                'iconBlack' => 'images/icon/icon_prestashop_black.png'
            ],
        ];

        foreach($technos as $techno) {
            Techno::updateOrCreate(['name' => $techno['name'], 'type' => $techno['type'], 'icon' => $techno['icon'], 'iconBlack' => $techno['iconBlack']]);
        }
    }
}
