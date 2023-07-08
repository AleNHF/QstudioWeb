<?php

namespace Database\Seeders;

use App\Models\Tutor;
use Illuminate\Database\Seeder;

class tutorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create test tutor
        Tutor::create([
            'name' => 'Junior Javier',
            'lastname' => 'Llanos Duran',
            'birthDay' => '01-01-1990',
            'phoneNumber' => '61315950',
            'profilePhoto' => null,
            'user_id' => 1
        ]);
    }
}
