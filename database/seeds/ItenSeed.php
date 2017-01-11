<?php

use Illuminate\Database\Seeder;

class ItenSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \borg\Itens::create([
            'product_id' => '1',
            'user_id' => 1,
            'goodto' => 'venda',
            'type' => 'naturais',
            'weight' => '2500',
        ]);

        \borg\Itens::create([
            'user_id' => 1,
            'title' => 'Pasta de amendoim',
            'description' => 'Deliciosa pasta de amendoim',
            'goodto' => 'venda',
            'type' => 'industrializados',
            'quantity' => '25',
            'photo' => 'wifds'
        ]);
    }
}
