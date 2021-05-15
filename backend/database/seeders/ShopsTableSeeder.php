<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # shops
        Shop::create([
          'id' => NULL,
          'user_id' => 5,
          'area_id' => 1,
          'name'=> '海山員',
          'intro'=> '充斥著山珍海味',
          'status' => 1
        ]);

        Shop::create([
          'id' => NULL,
          'user_id' => 6,
          'area_id' => 4,
          'name'=> '好吃燒臘飯',
          'intro'=> '專賣燒臘，不好吃不用錢',
          'status' => 0
        ]);
    }
}
