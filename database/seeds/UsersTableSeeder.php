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
            'user_role_id' => 1,
            'status' => true,
            'is_admin' => 1,
            'is_verified' => true,
        ]);

        User::create([
            'name' => 'Kawsar Mobin Rubel',
            'email' => 'kawsar@gmail.com',
            'password' => bcrypt('12345678'),
            'user_role_id' => 2,
            'status' => false,
            'is_admin' => false,
            'is_verified' => false,
        ]);
    }
}
