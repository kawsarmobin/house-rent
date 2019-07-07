<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => true,
            'is_admin' => 1,
            'is_verified' => true,
        ]);

        User::create([
            'name' => 'Kawsar Mobin Rubel',
            'email' => 'kawsar@gmail.com',
            'password' => bcrypt('12345678'),
            'user_role' => 1,
            'status' => true,
            'is_admin' => false,
            'is_verified' => true,
        ]);

        User::create([
            'name' => 'Ab Siddik',
            'email' => 'siddik@gmail.com',
            'password' => bcrypt('12345678'),
            'user_role' => 2,
            'status' => true,
            'is_admin' => false,
            'is_verified' => true,
        ]);
    }
}
