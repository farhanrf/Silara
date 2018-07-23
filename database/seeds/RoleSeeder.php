<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = [
         'Admin',
         'Super Admin'
      ];

      foreach ($roles as $role) {
         DB::table('role')->insert([
            'name' => $role
         ]);
      }
    }
}
