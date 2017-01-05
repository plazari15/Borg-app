<?php

use borg\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pedro Lazari',
            'email' => 'plazari96@gmail.com',
            'password' => bcrypt('pedro')
        ]);
    }
}
