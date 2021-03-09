<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Sergio',
            'email' => 'sergio@correo.com',
            'password' => Hash::make('12345678'),
        ]);

        $user2 = User::create([
            'name' => 'Alejandro',
            'email' => 'alejandro@correo.com',
            'password' => Hash::make('12345678'),
        ]);

    }
}
