<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlaceRoom;

class PlaceRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # place_rooms
        PlaceRoom::create([
          'id' => NULL,
          'build_id' => 1,
          'name' => '415 教室'
        ]);

        PlaceRoom::create([
          'id' => NULL,
          'build_id' => 1,
          'name' => '413 教室'
        ]);

        PlaceRoom::create([
          'id' => NULL,
          'build_id' => 2,
          'name' => '110 教室'
        ]);

        PlaceRoom::create([
          'id' => NULL,
          'build_id' => 2,
          'name' => '312 教室'
        ]);

        PlaceRoom::create([
          'id' => NULL,
          'build_id' => 3,
          'name' => 'D12 座位'
        ]);

        PlaceRoom::create([
          'id' => NULL,
          'build_id' => 3,
          'name' => 'C03 座位'
        ]);

        PlaceRoom::create([
          'id' => NULL,
          'build_id' => 4,
          'name' => '土地公廟旁'
        ]);

        PlaceRoom::create([
          'id' => NULL,
          'build_id' => 5,
          'name' => '老天鵝旁邊'
        ]);
    }
}
