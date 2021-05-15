<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserPlace;

class UserPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # user_places
        UserPlace::create([
          'id' => NULL,
          'user_id' => 2,
          'place_id' => 2,
          'name' => '大二教室',
          'detail' => '送到門前即可'
        ]);

        UserPlace::create([
          'id' => NULL,
          'user_id' => 1,
          'place_id' => 1,
          'name' => '電腦教室',
          'detail' => '小聲點，電腦教室不能吃東西'
        ]);
    }
}
