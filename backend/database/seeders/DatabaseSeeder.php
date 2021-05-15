<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Model::unguard();

      $this->call(UsersTableSeeder::class);
      $this->call(PlaceAreasTableSeeder::class);
      $this->call(PlaceBuildsTableSeeder::class);
      $this->call(PlaceRoomsTableSeeder::class);
      $this->call(UserPlacesTableSeeder::class);
      $this->call(ShopsTableSeeder::class);
      $this->call(MealsTableSeeder::class);

      Model::reguard();
    }
}
