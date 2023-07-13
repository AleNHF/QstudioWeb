<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create test location
        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '08:30',
            'date' => '30-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '08:35',
            'date' => '30-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '09:40',
            'date' => '30-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '10:30',
            'date' => '30-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '10:40',
            'date' => '30-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '08:30',
            'date' => '04-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud: 2.352222,latitud:48.856613',
            'time' => '08:35',
            'date' => '02-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '09:40',
            'date' => '02-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-43.172897,latitud:-22.906847',
            'time' => '10:30',
            'date' => '01-06-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '10:40',
            'date' => '11-06-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:139.691711,latitud:35.689487',
            'time' => '08:30',
            'date' => '10-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '08:35',
            'date' => '10-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '09:40',
            'date' => '10-05-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '10:30',
            'date' => '08-06-2023',
            'children_id' => 1
        ]);

        Location::create([
            'coordinates' => 'longitud:-63.186886,latitud:-17.789218',
            'time' => '10:40',
            'date' => '05-06-2023',
            'children_id' => 1
        ]);
    }
}
