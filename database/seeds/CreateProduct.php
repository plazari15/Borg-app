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
            'status' => 'ativo'
        ]);

        \borg\Products::create([
            'title' => 'Cenoura',
            'measure' => 'gramas',
            'status' => 'ativo'
        ]);

        \borg\Products::create([
            'title' => 'Kiabo',
            'measure' => 'toneladas',
            'status' => 'inativo'
        ]);
    }
}
