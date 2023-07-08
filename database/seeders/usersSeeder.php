<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create test users
        $user = User::create([
            'id' => 1,
            'name' => 'Junior Javier',
            'email' => 'junior@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
    }
}
