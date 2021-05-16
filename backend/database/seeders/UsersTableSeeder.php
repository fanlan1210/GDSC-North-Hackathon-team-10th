<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      # users
      # customer
      User::create([
          'id' => NULL,
          'account' => 'a001',
          'name' => 'customer1',
          'email' => 'a001@example.com',
          'phone' => '0912345678',
          'password' => hash('sha256', 'a001'),
          'type' => 0
      ]);

      User::create([
          'id' => NULL,
          'account' => 'a002',
          'name' => 'customer2',
          'email' => 'a002@example.com',
          'phone' => '0964531520',
          'password' => hash('sha256', 'a002'),
          'type' => 0
      ]);

      # delivery
      User::create([
          'id' => NULL,
          'account' => 'b001',
          'name' => 'delivery1',
          'email' => 'b001@example.com',
          'phone' => '0944567891',
          'password' => hash('sha256', 'b001'),
          'type' => 1
      ]);

      User::create([
          'id' => NULL,
          'account' => 'b002',
          'name' => 'delivery2',
          'email' => 'b002@example.com',
          'phone' => '0949564130',
          'password' => hash('sha256', 'b002'),
          'type' => 1
      ]);

      # owner
      User::create([
          'id' => NULL,
          'account' => 'c001',
          'name' => 'owner1',
          'email' => 'c001@example.com',
          'phone' => '0994567891',
          'password' => hash('sha256', 'c001'),
          'type' => 2
      ]);

      User::create([
          'id' => NULL,
          'account' => 'c002',
          'name' => 'owner2',
          'email' => 'c002@example.com',
          'phone' => '049803156',
          'password' => hash('sha256', 'c002'),
          'type' => 2
      ]);
    }
}
