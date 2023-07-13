<?php

namespace Database\Seeders;

use App\Models\Plans;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Plans=[
            [
                'countDevices'=>1,
                'status'=>true,
                'name'=>'Free',
                'price'=>0,
                'timePlan'=>'1 mes',
            ],
            [
                'countDevices'=>5,
                'status'=>true,
                'name'=>'Premium',
                'price'=>80,
                'timePlan'=>'12 meses',
            ],
            [
                'countDevices'=>3,
                'status'=>true,
                'name'=>'Standard',
                'price'=>50,
                'timePlan'=>'6 meses',
            ]
        ];
        foreach ($Plans as $plan) {
            Plans::create($plan);
        }
    }
}
