<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        //Vaciar la tabla 
        User::truncate();

        $faker = \Faker\Factory::create();
        $password = Hash::make('123456');

        //generamos un usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'alexis@admin.com',
            'password' => $password
        ]);

        //generamos algunos usuarios ficticios

        for ($i = 0; $i < 10; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password
            ]);    
        }
    }
}
