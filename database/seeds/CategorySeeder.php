<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
         'Monitor',
         'RAM',
         'Switch',
         'IP Phone',
         'Kabel',
         'Converter',
         'Adapter IP Phone',
         'Mesin Absen',
         'Battery',

      ];

      foreach ($categories as $category) {
         DB::table('categories')->insert([
              'name' => $category
         ]);
      }
    }
}
