<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('products_categories')->insert(
            [
                ['title' => 'chás'],
                ['title' => 'condimentos'],
                ['title' => 'conservas'],
                ['title' => 'frutas'],
                ['title' => 'geléias'],
                ['title' => 'legumes'],
                ['title' => 'massas']
            ]
        );
    }
}
