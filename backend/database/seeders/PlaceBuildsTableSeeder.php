<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlaceBuild;

class PlaceBuildsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # place_builds
        PlaceBuild::create([
          'id' => NULL,
          'area_id' => 1,
          'name' => '理工大樓'
        ]);

        PlaceBuild::create([
          'id' => NULL,
          'area_id' => 1,
          'name' => '綜合教學大樓'
        ]);

        PlaceBuild::create([
          'id' => NULL,
          'area_id' => 2,
          'name' => '學餐一樓'
        ]);

        PlaceBuild::create([
          'id' => NULL,
          'area_id' => 3,
          'name' => '山腳下'
        ]);

        PlaceBuild::create([
          'id' => NULL,
          'area_id' => 4,
          'name' => '醉月湖畔'
        ]);
    }
}
