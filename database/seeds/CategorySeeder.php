<?php

use Illuminate\Database\Seeder;
use Speakout\Modules\Account\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Category::updateOrCreate([
            'categoryName' => 'Agencies',
            'categoryDescription' => 'This is refer to: a governmental or other institution; the abstract principle that autonomous beings, agents, are capable of acting by themselves.',
            'creationDate' => currentTime(),
            'updationDate' => currentTime()
        ]);

        Category::updateOrCreate([
            'categoryName' => 'Legislature',
            'categoryDescription' => 'A legislature is a deliberative assembly with the authority to make laws for a political entity such as a country or city.',
            'creationDate' => currentTime(),
            'updationDate' => currentTime()
        ]);

        Category::updateOrCreate([
            'categoryName' => 'Executive',
            'categoryDescription' => 'The executive is the organ exercising authority in and holding responsibility for the governance of a state.',
            'creationDate' => currentTime(),
            'updationDate' => currentTime()
        ]);

        Category::updateOrCreate([
            'categoryName' => 'Judiciary',
            'categoryDescription' => 'This is the system of courts that interprets and applies the law in a country, state or an international community. ',
            'creationDate' => currentTime(),
            'updationDate' => currentTime()
        ]);


    }
}
