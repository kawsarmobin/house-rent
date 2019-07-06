<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\UserRole::create([
            'id' => 1,
            'type_of_user' => 'Admin'
        ]);

        App\Models\UserRole::create([
            'id' => 2,
            'type_of_user' => 'Landlord'
        ]);
    }
}
