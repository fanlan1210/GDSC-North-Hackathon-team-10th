<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meal;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # meal
        Meal::create([
          'id' => NULL,
          'shop_id' => 1,
          'name' => '山珍',
          'price' => 100,
          'status' => 1,
          'note' => '雞豬牛羊通通有'
        ]);

        Meal::create([
          'id' => NULL,
          'shop_id' => 1,
          'name' => '海味',
          'price' => 200,
          'status' => 1,
          'note' => '適合分不清小卷、花枝、透抽的你'
        ]);

        Meal::create([
          'id' => NULL,
          'shop_id' => 1,
          'name' => '山珍海味',
          'price' => 1000,
          'status' => 0,
          'note' => '太盤了，沒人要買'
        ]);

        Meal::create([
          'id' => NULL,
          'shop_id' => 2,
          'name' => '經典燒臘',
          'price' => 70,
          'status' => 1,
          'note' => '經典燒臘飯！值得您一吃再吃'
        ]);

        Meal::create([
          'id' => NULL,
          'shop_id' => 2,
          'name' => '臺式燒臘',
          'price' => 70,
          'status' => 1,
          'note' => '經典改良、美味再現'
        ]);

        Meal::create([
          'id' => NULL,
          'shop_id' => 2,
          'name' => '八寶飯',
          'price' => 80,
          'status' => 0,
          'note' => '2.66666...個三寶'
        ]);
    }
}
