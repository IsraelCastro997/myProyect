<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'prueba',
            'email' => 'prueba@gmail.com',
            'password' => bcrypt('12345678'),
            'avatar' => 'avatar.png',
            'username' => 'prueba',
        ]);
        $user->assignRole('Admin');

        User::factory(199)->create();
    }
}
