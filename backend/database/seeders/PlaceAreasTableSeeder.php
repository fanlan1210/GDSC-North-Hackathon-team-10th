<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlaceArea;

class PlaceAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # place_areas
        PlaceArea::create([
          'id' => NULL,
          'name' => '嘉義校區'
        ]);

        PlaceArea::create([
          'id' => NULL,
          'name' => '暨南校區'
        ]);

        PlaceArea::create([
          'id' => NULL,
          'name' => '桃銘校區'
        ]);

        PlaceArea::create([
          'id' => NULL,
          'name' => '師大校區'
        ]);

    }
}
