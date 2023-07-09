<?php

namespace Database\Seeders;

use App\Models\Children;
use App\Models\Token;
use Illuminate\Database\Seeder;

class ChildrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kid = Children::create([
            'name' => 'cristian',
            'lastname' => 'xdxd',
            'alias' => 'xdxd',
            'gender' => 'M',
            'birthDay' => '1990-01-01',
            'profilePhoto' => null,
            'tutor_id' => 1
        ]);
        $kid2 = Children::create([
            'name' => 'cristian2',
            'lastname' => 'xdxd',
            'alias' => 'xdxd',
            'gender' => 'M',
            'birthDay' => '1990-01-01',
            'profilePhoto' => null,
            'tutor_id' => 1
        ]);
        $kid3 = Children::create([
            'name' => 'cristian3',
            'lastname' => 'xdxd',
            'alias' => 'xdxd',
            'gender' => 'M',
            'birthDay' => '1990-01-01',
            'profilePhoto' => null,
            'tutor_id' => 1
        ]);

        $token = Token::create([
            'code' => '111111',
            'createDate' => '2023-07-08 19:13:00',
            'status' => 0,
            'children_id' => 1,

        ]);
    }
}
