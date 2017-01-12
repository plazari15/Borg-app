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
        $user = User::create([
            'name' => 'Pedro Lazari',
            'email' => 'plazari96@gmail.com',
            'api_token' => str_random(60),
            'password' => bcrypt('pedro')
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Pedro Fornecedor',
            'email' => 'fornecedor@gmail.com',
            'api_token' => str_random(60),
            'password' => bcrypt('pedro')
        ]);

        $user->assignRole('fornecedor');
    }
}
