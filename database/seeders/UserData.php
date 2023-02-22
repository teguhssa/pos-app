<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt("password"),
                'role' => "admin"
            ],
            [
                'name' => 'Kasir',
                'username' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt("password"),
                'role' => "kasir"
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
