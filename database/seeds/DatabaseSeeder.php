<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Roles::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CreateProduct::class);
        $this->call(ItenSeed::class);
        $this->call(CategorySeeder::class);
    }
}
