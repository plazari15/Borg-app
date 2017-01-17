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

        ]);

        \borg\Products::create([
            'title' => 'Cenoura',
        ]);

        \borg\Products::create([
            'title' => 'Kiabo',
        ]);
    }
}
