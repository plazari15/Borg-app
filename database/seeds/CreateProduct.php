<?php

use Illuminate\Database\Seeder;

class CreateProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \borg\Products::create([
            'title' => 'Vagem',
            'measure' => 'kilos',

        ]);

        \borg\Products::create([
            'title' => 'Cenoura',
            'measure' => 'gramas',
        ]);

        \borg\Products::create([
            'title' => 'Kiabo',
            'measure' => 'toneladas',
        ]);
    }
}
