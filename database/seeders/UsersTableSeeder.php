<?php

namespace Database\Seeders;

use App\Models\User;
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
                'name'=>'GUSTAVO ADOLFO GÓMEZ LÓPEZ',
                'email'=> 'gustavo.gomez.lopez@outlook.com',
                'password'=> bcrypt('Lagoma619'),
                'dni'=> '1130599190',
                'address' => 'Carrera 80 #1c-50',
                'phone' => '3044195396',
                'role' => 'admin'
            ],[
                'name'=>'LUZ STELLA GÓMEZ LÓPEZ',
                'email'=> 'stella.gomez@gmail.com',
                'password'=> bcrypt('Stella.1203'),
                'dni'=> '31974517',
                'address' => 'Carrera 80 #1c-50',
                'phone' => '3044195396',
                'role' => 'doctor'
            ]
        );
        //factory(User::class, 50)->create();
        User::factory()->count(30)->create();

    }
}
